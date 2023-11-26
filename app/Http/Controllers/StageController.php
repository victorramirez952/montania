<?php

namespace App\Http\Controllers;

use App\Http\Requests\StageRequest;
use App\Models\Customer;
use App\Models\Project;
use App\Models\Stage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class StageController extends Controller
{
    public function store(StageRequest $request){
        $id_project = $request->input('id_project');
        $id_user = $request->input('id_user');
        $project = Project::find($id_project);

        $requestData = $request->only(['date', 'description']);
        $requestData['completed'] = $request->has('completed') ? $request->input('completed') : false;
        $stage = $project->stages()->create($requestData);
        $customer = Customer::find($id_user);
        return redirect()->route('customers.show', $customer);
    }

    public function update(Request $request, $id_project){
        // Retrieve the stage to be updated
        
        // Update the stage data
        $id_stage = $request->input('id_stage');
        $stage = Stage::findOrFail($id_stage);

        $stage->date = $request->input('date');
        $stage->description = $request->input('description');
        $stage->completed = $request->has('completed') ? $request->input('completed') : false;

        // Save the updated stage
        $stage->save();

        $id_customer = $request->input('id_customer');
        $customer = Customer::find($id_customer);

        // Redirect to the appropriate page (adjust this based on your application's logic)
        return redirect()->route('customers.show', $customer);
    }

    public function destroy(Stage $stage, Customer $customer){
        $stage->delete();
        return redirect()->route('customers.show', $customer);
    }
}
