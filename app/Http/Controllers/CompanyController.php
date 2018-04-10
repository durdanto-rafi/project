<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Http\Resources\Company as CompanyResource;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Companies
        $companies = Company::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of companies as a resource
        return CompanyResource::collection($companies);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $companies = $request->isMethod('put') ? Company::findOrFail($request->id) : new Company;

        $companies->id = $request->input('id');
        $companies->account_id = $request->input('account_id');
        $companies->company_name = $request->input('company_name');
        $companies->is_customer = $request->input('is_customer');
        $companies->links = $request->input('links');
        $companies->email = $request->input('email');
        $companies->address = $request->input('address');

        if($companies->save()) {
            return new CompanyResource($companies);
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
        // Get companies
        $companies = Company::findOrFail($id);

        // Return single companies as a resource
        return new CompanyResource($companies);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get companies
        $companies = Company::findOrFail($id);

        if($companies->delete()) {
            return new CompanyResource($companies);
        }    
    }
}
