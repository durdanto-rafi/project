<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use App\Http\Resources\Module as ModuleResource;

class ModuleController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get modules
        $modules = Module::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of modules as a resource
        return ModuleResource::collection($modules);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modules = $request->isMethod('put') ? Module::findOrFail($request->id) : new Module;

        $modules->id = $request->input('id');
        $modules->block_id = $request->input('block_id');
        $modules->module_name = $request->input('module_name');
        $modules->comment = $request->input('comment');
        $modules->update_by = $request->input('update_by');
        

        if($modules->save()) {
            return new ModuleResource($modules);
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
        // Get modules
        $modules = Module::findOrFail($id);

        // Return single modules as a resource
        return new ModuleResource($modules);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get modules
        $modules = Module::findOrFail($id);

        if($modules->delete()) {
            return new ModuleResource($modules);
        }    
    }
}
