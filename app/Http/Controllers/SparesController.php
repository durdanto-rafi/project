<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spares;
use App\Http\Resources\Spares as SparesResource;
class SparesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get spare
        $spare = Spares::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of spare as a resource
        return SparesResource::collection($spare);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $spare = $request->isMethod('put') ? Spares::findOrFail($request->id) : new Spares;

        $spare->id = $request->input('id');
        $spare->account_id = $request->input('account_id');
        $spare->asset_id = $request->input('asset_id');
        $spare->spare_serial = $request->input('spare_serial');
        $spare->spare_type = $request->input('spare_type');
        $spare->spare_image = $request->input('spare_image');
        $spare->spare_description = $request->input('spare_description');
        $spare->spare_manufacturar_id = $request->input('spare_manufacturar_id');
        $spare->minimum_stock = $request->input('minimum_stock');
        $spare->current_stock = $request->input('current_stock');
        $spare->update_by = $request->input('update_by');

        if($spare->save()) {
            return new SparesResource($spare);
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
        // Get spare
        $spare = Spares::findOrFail($id);

        // Return single spare as a resource
        return new SparesResource($spare);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get spare
        $spare = Spares::findOrFail($id);

        if($spare->delete()) {
            return new SparesResource($spare);
        }    
    }
}
