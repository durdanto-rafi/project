<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobPriority;
use App\Http\Resources\JobPriority as JobPriorityResource;

class JobPriorityController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get jobpriorities
        $jobpriorities = JobPriority::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of jobpriorities as a resource
        return JobPriorityResource::collection($jobpriorities);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jobpriorities = $request->isMethod('put') ? JobPriority::findOrFail($request->id) : new JobPriority;

        $jobpriorities->id = $request->input('id');
        $jobpriorities->company_id = $request->input('company_id');
        $jobpriorities->job_priority = $request->input('job_priority');
        $jobpriorities->update_by = $request->input('update_by');
        if($jobpriorities->save()) {
            return new JobPriorityResource($jobpriorities);
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
        // Get jobpriorities
        $jobpriorities = JobPriority::findOrFail($id);

        // Return single jobpriorities as a resource
        return new JobPriorityResource($jobpriorities);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get jobpriorities
        $jobpriorities = JobPriority::findOrFail($id);

        if($jobpriorities->delete()) {
            return new JobPriorityResource($jobpriorities);
        }    
    }
}
