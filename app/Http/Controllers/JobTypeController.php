<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobType;
use App\Http\Resources\JobType as JobTypeResource;

class JobTypeController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get jobtypes
        $jobtypes = JobType::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of jobtypes as a resource
        return JobTypeResource::collection($jobtypes);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jobtypes = $request->isMethod('put') ? JobType::findOrFail($request->id) : new JobType;

        $jobtypes->id = $request->input('id');
        $jobtypes->company_id = $request->input('company_id');
        $jobtypes->job_type = $request->input('job_type');
        $jobtypes->update_by = $request->input('update_by');
        
        if($jobtypes->save()) {
            return new JobTypeResource($jobtypes);
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
        // Get jobtypes
        $jobtypes = JobType::findOrFail($id);

        // Return single jobtypes as a resource
        return new JobTypeResource($jobtypes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get jobtypes
        $jobtypes = JobType::findOrFail($id);

        if($jobtypes->delete()) {
            return new JobTypeResource($jobtypes);
        }    
    }
}
