<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Block;
use App\Http\Resources\Block as BlockResource;

class BlockController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get blocks
        $blocks = Block::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of blocks as a resource
        return BlockResource::collection($blocks);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blocks = $request->isMethod('put') ? Block::findOrFail($request->id) : new Block;

        $blocks->id = $request->input('id');
        $blocks->blocks_name = $request->input('blocks_name');
        $blocks->update_by = $request->input('update_by');
        if($blocks->save()) {
            return new BlockResource($blocks);
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
        // Get blocks
        $blocks = Block::findOrFail($id);

        // Return single blocks as a resource
        return new BlockResource($blocks);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get blocks
        $blocks = Block::findOrFail($id);

        if($blocks->delete()) {
            return new BlockResource($blocks);
        }    
    }
}
