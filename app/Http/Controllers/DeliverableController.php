<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeliverableRequest;
use App\Models\Deliverable;
use App\Models\Service;
use Illuminate\Http\Request;

class DeliverableController extends Controller
{
    public function store(DeliverableRequest $request){
        $deliverable = Deliverable::create($request->only(['id_service', 'title']) + [
            'description' => $request->input('deliverable_description'),
        ]);
        return back()->with('success', 'Deliverable created successfully!');
    }

    public function update(Request $request, Deliverable $deliverable, Service $service){
        // $deliverable->update($request->all());
        // return back()->with('success', 'Deliverable created successfully!');
        // return redirect()->route('services.show', $service);
    }
}
