<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerBlockAssociation;
use App\Http\Resources\CustomerBlockAssociation as CustomerBlockAssociationResource;

class CustomerBlockAssociationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get customerblockassociations
        $customerblockassociations = CustomerBlockAssociation::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of customerblockassociations as a resource
        return CustomerBlockAssociationResource::collection($customerblockassociations);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customerblockassociations = $request->isMethod('put') ? CustomerBlockAssociation::findOrFail($request->id) : new CustomerBlockAssociation;

        $customerblockassociations->id = $request->input('id');
        $customerblockassociations->company_id = $request->input('company_id');
        $customerblockassociations->block_id = $request->input('block_id');
        $customerblockassociations->update_by = $request->input('update_by');
        if($customerblockassociations->save()) {
            return new CustomerBlockAssociationResource($customerblockassociations);
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
        // Get customerblockassociations
        $customerblockassociations = CustomerBlockAssociation::findOrFail($id);

        // Return single customerblockassociations as a resource
        return new CustomerBlockAssociationResource($customerblockassociations);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get customerblockassociations
        $customerblockassociations = CustomerBlockAssociation::findOrFail($id);

        if($customerblockassociations->delete()) {
            return new CustomerBlockAssociationResource($customerblockassociations);
        }    
    }
}
