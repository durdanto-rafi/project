<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Http\Resources\Company as CompanyResource;
use DB;

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
        $companies->update_by = $request->input('update_by');
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

    /**
     * Load companies.
     *$
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function loadCompanies()
    {
        // Get companies
        $companies = Company::pluck("company_name","id")->all();

        // Return single companies as a resource
        return response()->json(['companies' => $companies]);
    }

     /**
     * Show the application getSubjectContents.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAssetsByCompanyId(Request $request)
    {
        //$this->transcribeAll($request->subject_number);
        if($request->ajax()){
    		$data = DB::select("SELECT
                            `assets`.`id` AS `id`,
                            `companies`.`company_name` AS `company_name`,
                            `model_types`.`model_make` AS `model_make`,
                            `model_types`.`model_type` AS `model_type`,
                            `assets`.`asset_name` AS `asset_name`,
                            `assets`.`label_value` AS `label_value`,
                            `assets`.`asset_description` AS `asset_description`,
                            `assets`.`asset_quality` AS `asset_quality`,
                            `assets`.`asset_cost` AS `asset_cost`,
                            `assets`.`asset_status` AS `asset_status`
                        FROM
                            (
                                (
                                    (
                                        (
                                            `asset_models`
                                            JOIN `assets` ON (
                                                (
                                                    `asset_models`.`id` = `assets`.`model_id`
                                                )
                                            )
                                        )
                                        JOIN `model_types` ON (
                                            (
                                                `model_types`.`id` = `asset_models`.`model_type`
                                            )
                                        )
                                    )
                                    JOIN `companies` ON (
                                        (
                                            `companies`.`id` = `assets`.`company_id`
                                        )
                                    )
                                )
                                JOIN `label_names` ON (
                                    (
                                        `label_names`.`id` = `assets`.`label_id`
                                    )
                                )
                            )
                        WHERE
                            (
                                `companies`.`id` = ?
                            )", [$request->companyId]);

            
            return response()->json(['assets'=> $data]);
    	}
    }
}
