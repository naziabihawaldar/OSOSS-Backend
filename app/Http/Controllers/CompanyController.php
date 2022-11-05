<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        try
        {
            $companies = Company::with('users')->get();
            return ['status' => 1, 'message' => 'success' ,'data' => $companies];
        }catch (\Exception $e)
        {
            logger($e);
            return ['status' => 0,'message' => 'Error Occurred'];
        }
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'address'=>'required'
        ]);
        try
        {
            $company = new Company;
            $company->id = (string)Uuid::generate(4);
            $company->name = $request->name;
            $company->address = $request->address;
            $company->save();
            return ['status' => 1,'message' => 'success','data' => $company];
        }catch (\Exception $e)
        {
            logger($e);
            return ['status' => 0,'message' => 'error occurred'];
        }

    }

    public function edit(Request $request)
    {
        $this->validate($request,[
            'id'=>'required',
            'name'=>'required',
            'address'=>'required'
        ]);
        try
        {
            $company = Company::find($request->id);
            if($company)
            {
                $company->name = $request->name;
                $company->address = $request->address;
                $company->save();
                return ['status' => 1, 'message' => 'success' ,'data' => $company];
            }
            return ['status' => 0,'message' => 'Company not found'];
        }catch (\Exception $e)
        {
            logger($e);
            return ['status' => 0,'message' => 'Error Occurred'];
        }
    }

    public function delete(Request $request)
    {
        $this->validate($request,[
            'id'=>'required'
        ]);
        try {
            $company = Company::find($request->id);
            if($company)
            {
                $company->delete();
                return ['status' => 1, 'message' => 'success'];
            }
            return ['status' => 0,'message' => 'company not found'];
        }catch (\Exception $e)
        {
            logger($e);
            return ['status' => 0 ,'message' => 'Error Occurred'];
        }
    }
}
