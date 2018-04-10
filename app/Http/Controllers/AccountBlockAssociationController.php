<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AccountBlockAssociation;
use App\Http\Resources\AccountBlockAssociation as AccountBlockAssociationResource;

class AccountBlockAssociationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get accountblockassociations
        $accountblockassociations = AccountBlockAssociation::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of accountblockassociations as a resource
        return AccountBlockAssociationResource::collection($accountblockassociations);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $accountblockassociations = $request->isMethod('put') ? AccountBlockAssociation::findOrFail($request->id) : new AccountBlockAssociation;

        $accountblockassociations->id = $request->input('id');
        $accountblockassociations->account_id = $request->input('account_id');
        $accountblockassociations->block_id = $request->input('block_id');
        $accountblockassociations->block_stat_id = $request->input('block_stat_id');

        if($accountblockassociations->save()) {
            return new AccountBlockAssociationResource($accountblockassociations);
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
        // Get accountblockassociations
        $accountblockassociations = AccountBlockAssociation::findOrFail($id);

        // Return single accountblockassociations as a resource
        return new AccountBlockAssociationResource($accountblockassociations);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get accountblockassociations
        $accountblockassociations = AccountBlockAssociation::findOrFail($id);

        if($accountblockassociations->delete()) {
            return new AccountBlockAssociationResource($accountblockassociations);
        }    
    }
}
