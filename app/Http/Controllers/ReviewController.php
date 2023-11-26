<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Project;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(ReviewRequest $request){
        $id_project = $request->input('id_project');
        $project = Project::find($id_project);
    
        // Check if the project exists
        if ($project) {
            $reviewData = $request->only(['text', 'id_customer']);
            $reviewData['id_project'] = $id_project;
    
            // Create a new review and associate it with the project
            $review = $project->reviews()->create($reviewData);
    
            return back()->with('success', 'Review created successfully!');
        } else {
            return back()->with('error', 'Project not found.');
        }
    }
    

    public function update(ReviewRequest $request){
        $id_review = $request->input('id_review');
        $review = Review::find($id_review);
    
        if ($review) {
            $review->update($request->only([
                'text',
            ]));
    
            return back()->with('success', 'Review edited successfully!');
        } else {
            return back()->with('error', 'Review not found.');
        }
    }    

    public function destroy(Review $review){
        $review->delete();
        return back()->with('success', 'Review deleted successfully!');
    }
}
