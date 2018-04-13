<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LabelName;
use App\Http\Resources\LabelName as LabelNameResource;

class LabelNameController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get labelnames
        $labelnames = LabelName::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of labelnames as a resource
        return LabelNameResource::collection($labelnames);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $labelnames = $request->isMethod('put') ? LabelName::findOrFail($request->id) : new LabelName;

        $labelnames->id = $request->input('id');
        $labelnames->name = $request->input('name');
        $labelnames->description = $request->input('description');
        $labelnames->update_by = $request->input('update_by');
        
        if($labelnames->save()) {
            return new LabelNameResource($labelnames);
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
        // Get labelnames
        $labelnames = LabelName::findOrFail($id);

        // Return single labelnames as a resource
        return new LabelNameResource($labelnames);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get labelnames
        $labelnames = LabelName::findOrFail($id);

        if($labelnames->delete()) {
            return new LabelNameResource($labelnames);
        }    
    }
}
