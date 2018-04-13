<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerBlockModuleActivity;
use App\Http\Resources\CustomerBlockModuleActivity as CustomerBlockModuleActivityResource;

class CustomerBlockModuleActivityController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get customerblockmoduleactivity
        $customerblockmoduleactivity = CustomerBlockModuleActivity::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of customerblockmoduleactivity as a resource
        return CustomerBlockModuleActivityResource::collection($customerblockmoduleactivity);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customerblockmoduleactivity = $request->isMethod('put') ? CustomerBlockModuleActivity::findOrFail($request->id) : new CustomerBlockModuleActivity;

        $customerblockmoduleactivity->id = $request->input('id');
        $customerblockmoduleactivity->contact_id = $request->input('contact_id');
        $customerblockmoduleactivity->customer_block_id = $request->input('customer_block_id');
        $customerblockmoduleactivity->module_id = $request->input('module_id');
        $customerblockmoduleactivity->activity_id = $request->input('activity_id');
        $customerblockmoduleactivity->update_by = $request->input('update_by');
        if($customerblockmoduleactivity->save()) {
            return new CustomerBlockModuleActivityResource($customerblockmoduleactivity);
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
        // Get customerblockmoduleactivity
        $customerblockmoduleactivity = CustomerBlockModuleActivity::findOrFail($id);

        // Return single customerblockmoduleactivity as a resource
        return new CustomerBlockModuleActivityResource($customerblockmoduleactivity);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get customerblockmoduleactivity
        $customerblockmoduleactivity = CustomerBlockModuleActivity::findOrFail($id);

        if($customerblockmoduleactivity->delete()) {
            return new CustomerBlockModuleActivityResource($customerblockmoduleactivity);
        }    
    }
}
