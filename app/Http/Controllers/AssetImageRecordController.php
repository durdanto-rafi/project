<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssetImageRecord;
use App\Http\Resources\AssetImageRecord as AssetImageRecordResource;

class AssetImageRecordController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get assetimagerecords
        $assetimagerecords = AssetImageRecord::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of assetimagerecords as a resource
        return AssetImageRecordResource::collection($assetimagerecords);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $assetimagerecords = $request->isMethod('put') ? AssetImageRecord::findOrFail($request->id) : new AssetImageRecord;

        $assetimagerecords->id = $request->input('id');
        $assetimagerecords->company_id = $request->input('company_id');
        $assetimagerecords->asset_id = $request->input('asset_id');
        $assetimagerecords->image = $request->input('image');
        $assetimagerecords->description = $request->input('description');
        $assetimagerecords->update_by = $request->input('update_by');

        if($assetimagerecords->save()) {
            return new AssetImageRecordResource($assetimagerecords);
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
        // Get assetimagerecords
        $assetimagerecords = AssetImageRecord::findOrFail($id);

        // Return single assetimagerecords as a resource
        return new AssetImageRecordResource($assetimagerecords);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get assetimagerecords
        $assetimagerecords = AssetImageRecord::findOrFail($id);

        if($assetimagerecords->delete()) {
            return new AssetImageRecordResource($assetimagerecords);
        }    
    }
}
