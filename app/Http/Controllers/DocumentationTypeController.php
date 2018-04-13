<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DocumentationType;
use App\Http\Resources\DocumentationType as DocumentationTypeResource;

class DocumentationTypeController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get documentationtypes
        $documentationtypes = DocumentationType::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of documentationtypes as a resource
        return DocumentationTypeResource::collection($documentationtypes);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $documentationtypes = $request->isMethod('put') ? DocumentationType::findOrFail($request->id) : new DocumentationType;

        $documentationtypes->id = $request->input('id');
        $documentationtypes->company_id = $request->input('company_id');
        $documentationtypes->type = $request->input('type');
        $documentationtypes->update_by = $request->input('update_by');
        if($documentationtypes->save()) {
            return new DocumentationTypeResource($documentationtypes);
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
        // Get documentationtypes
        $documentationtypes = DocumentationType::findOrFail($id);

        // Return single documentationtypes as a resource
        return new DocumentationTypeResource($documentationtypes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get documentationtypes
        $documentationtypes = DocumentationType::findOrFail($id);

        if($documentationtypes->delete()) {
            return new DocumentationTypeResource($documentationtypes);
        }    
    }
}
