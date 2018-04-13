<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Http\Resources\Activity as ActivityResource;

class ActivityController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get activities
        $activities = Activity::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of activities as a resource
        return ActivityResource::collection($activities);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $activities = $request->isMethod('put') ? Activity::findOrFail($request->id) : new Activity;

        $activities->id = $request->input('id');
        $activities->activity_name = $request->input('activity_name');
        $activities->update_by = $request->input('update_by');
        if($activities->save()) {
            return new ActivityResource($activities);
        }
        
    }

    /**
     * Display the specified resource.
     *$
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get activities
        $activities = Activity::findOrFail($id);

        // Return single activities as a resource
        return new ActivityResource($activities);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get activities
        $activities = Activity::findOrFail($id);

        if($activities->delete()) {
            return new ActivityResource($activities);
        }    
    }
}
