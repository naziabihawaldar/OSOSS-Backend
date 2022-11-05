<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        try
        {
            $users = User::with('companies')->get();
            return ['status' => 1, 'message' => 'success' ,'data' => $users];
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
            'email'=>'required'
        ]);
        try
        {
            $user = new User;
            $user->id = (string)Uuid::generate(4);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            return ['status' => 1,'message' => 'success','data' => $user];
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
            $user = User::find($request->id);
            if($user)
            {
                $user->name = $request->name;
                $user->address = $request->address;
                $user->save();
                return ['status' => 1, 'message' => 'success' ,'data' => $user];
            }
            return ['status' => 0,'message' => 'user not found'];
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
            $user = User::find($request->id);
            if($user)
            {
                $user->delete();
                return ['status' => 1, 'message' => 'success'];
            }
            return ['status' => 0,'message' => 'user not found'];
        }catch (\Exception $e)
        {
            logger($e);
            return ['status' => 0 ,'message' => 'Error Occurred'];
        }
    }
}
