<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlockStat;
use App\Http\Resources\BlockStat as BlockStatResource;

class BlockStatController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get blockstats
        $blockstats = BlockStat::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of blockstats as a resource
        return BlockStatResource::collection($blockstats);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blockstats = $request->isMethod('put') ? BlockStat::findOrFail($request->id) : new BlockStat;

        $blockstats->id = $request->input('id');
        $blockstats->block_stat_name = $request->input('block_stat_name');

        if($blockstats->save()) {
            return new BlockStatResource($blockstats);
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
        // Get blockstats
        $blockstats = BlockStat::findOrFail($id);

        // Return single blockstats as a resource
        return new BlockStatResource($blockstats);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get blockstats
        $blockstats = BlockStat::findOrFail($id);

        if($blockstats->delete()) {
            return new BlockStatResource($blockstats);
        }    
    }
}
