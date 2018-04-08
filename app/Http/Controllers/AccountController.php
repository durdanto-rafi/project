<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Http\Resources\Account as AccountResource;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Accounts
        $accounts = Account::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of Accounts as a resource
        return AccountResource::collection($accounts);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $accounts = $request->isMethod('put') ? Account::findOrFail($request->id) : new Account;

        $accounts->id = $request->input('id');
        $accounts->name = $request->input('name');
        $accounts->email = $request->input('email');

        if($accounts->save()) {
            return new AccountResource($accounts);
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
        // Get accounts
        $accounts = Account::findOrFail($id);

        // Return single accounts as a resource
        return new AccountResource($accounts);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get accounts
        $accounts = Account::findOrFail($id);

        if($accounts->delete()) {
            return new AccountResource($accounts);
        }    
    }
}
