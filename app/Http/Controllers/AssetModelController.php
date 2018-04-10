<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssetModel;
use App\Http\Resources\AssetModel as AssetModelResource;

class AssetModelController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get assetmodels
        $assetmodels = AssetModel::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of assetmodels as a resource
        return AssetModelResource::collection($assetmodels);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $assetmodels = $request->isMethod('put') ? AssetModel::findOrFail($request->id) : new AssetModel;

        $assetmodels->id = $request->input('id');
        $assetmodels->account_id = $request->input('account_id');
        $assetmodels->model_type = $request->input('model_type');
        $assetmodels->model_image = $request->input('model_image');
        $assetmodels->model_rent = $request->input('model_rent');
        $assetmodels->model_rent_frequency = $request->input('model_rent_frequency');
        $assetmodels->minimum_stock = $request->input('minimum_stock');
        $assetmodels->current_stock = $request->input('current_stock');

        if($assetmodels->save()) {
            return new AssetModelResource($assetmodels);
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
        // Get assetmodels
        $assetmodels = AssetModel::findOrFail($id);

        // Return single assetmodels as a resource
        return new AssetModelResource($assetmodels);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get assetmodels
        $assetmodels = AssetModel::findOrFail($id);

        if($assetmodels->delete()) {
            return new AssetModelResource($assetmodels);
        }    
    }
}
