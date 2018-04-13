<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FaultType;
use App\Http\Resources\FaultType as FaultTypeResource;

class FaultTypeController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get faulttypes
        $faulttypes = FaultType::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of faulttypes as a resource
        return FaultTypeResource::collection($faulttypes);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faulttypes = $request->isMethod('put') ? FaultType::findOrFail($request->id) : new FaultType;

        $faulttypes->id = $request->input('id');
        $faulttypes->company_id = $request->input('company_id');
        $faulttypes->asset_id = $request->input('asset_id');
        $faulttypes->type = $request->input('type');
        $faulttypes->update_by = $request->input('update_by');
        if($faulttypes->save()) {
            return new FaultTypeResource($faulttypes);
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
        // Get faulttypes
        $faulttypes = FaultType::findOrFail($id);

        // Return single faulttypes as a resource
        return new FaultTypeResource($faulttypes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get faulttypes
        $faulttypes = FaultType::findOrFail($id);

        if($faulttypes->delete()) {
            return new FaultTypeResource($faulttypes);
        }    
    }
}
