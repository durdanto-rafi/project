<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\Http\Resources\Asset as AssetResource;

class AssetController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get assets
        $assets = Asset::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of assets as a resource
        return AssetResource::collection($assets);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $assets = $request->isMethod('put') ? Asset::findOrFail($request->id) : new Asset;

        $assets->id = $request->input('id');
        $assets->account_id = $request->input('account_id');
        $assets->model_id = $request->input('model_id');
        $assets->asset_name = $request->input('asset_name');
        $assets->label_id = $request->input('label_id');
        $assets->label_value = $request->input('label_value');
        $assets->asset_description = $request->input('asset_description');
        $assets->asset_quality = $request->input('asset_quality');
        $assets->asset_status = $request->input('asset_status');
        $assets->asset_cost = $request->input('asset_cost');

        if($assets->save()) {
            return new AssetResource($assets);
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
        // Get assets
        $assets = Asset::findOrFail($id);

        // Return single assets as a resource
        return new AssetResource($assets);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get assets
        $assets = Asset::findOrFail($id);

        if($assets->delete()) {
            return new AssetResource($assets);
        }    
    }
}
