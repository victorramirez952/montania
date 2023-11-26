<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResourceRequest;
use App\Models\Customer;
use App\Models\Project;
use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function store(ResourceRequest $request, Customer $customer, Project $defaultProject){
        $defaultProject->resources()->create($request->all());
        return redirect()->route('customers.resources', [$customer, $defaultProject]);
    }

    public function update(ResourceRequest $request, Project $defaultProject){
        $resourceId = $request->input('id_resource');
        $resource = $defaultProject->resources()->where('id_resource', $resourceId)->firstOrFail();
        $resource->update($request->only([
            'title',
            'link'
        ]));
    
        return back()->with('success', 'Resource edited successfully!');
    }    

    public function destroy(Resource $resource){
        $resource->delete();
        return back()->with('success', 'Resource deleted successfully!');
    }
}
