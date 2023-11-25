<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeliverableRequest;
use App\Models\Deliverable;
use App\Models\Service;
use Illuminate\Http\Request;

class DeliverableController extends Controller
{

    public function show(Service $service, Deliverable $deliverable){
        return view('deliverables.show', compact('service', 'deliverable'));
    }

    public function store(DeliverableRequest $request){
        $deliverable = Deliverable::create($request->only(['id_service', 'title']) + [
            'description' => $request->input('deliverable_description'),
        ]);
        return back()->with('success', 'Deliverable created successfully!');
    }


    public function update(DeliverableRequest $request, Deliverable $deliverable) {
        $deliverable->update([
            'id_service' => $request->input('id_service'),
            'title' => $request->input('title'),
            'description' => $request->input('deliverable_description'),
        ]);
        $service = Service::find($deliverable->id_service);
        return redirect()->route('services.show', $service);
    }

    public function destroy(Deliverable $deliverable){
        $service = Service::find($deliverable->id_service);
        $deliverable->delete();
        return redirect()->route('services.show', $service);
    }
}
