<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelType;
use App\Http\Resources\ModelType as ModelTypeResource;

class ModelTypeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get modeltypes
        $modeltypes = ModelType::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of modeltypes as a resource
        return ModelTypeResource::collection($modeltypes);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modeltypes = $request->isMethod('put') ? ModelType::findOrFail($request->id) : new ModelType;

        $modeltypes->id = $request->input('id');
        $modeltypes->company_id = $request->input('company_id');
        $modeltypes->model_make = $request->input('model_make');
        $modeltypes->model_type = $request->input('model_type');
        if($modeltypes->save()) {
            return new ModelTypeResource($modeltypes);
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
        // Get modeltypes
        $modeltypes = ModelType::findOrFail($id);

        // Return single modeltypes as a resource
        return new ModelTypeResource($modeltypes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get modeltypes
        $modeltypes = ModelType::findOrFail($id);

        if($modeltypes->delete()) {
            return new ModelTypeResource($modeltypes);
        }    
    }
}
