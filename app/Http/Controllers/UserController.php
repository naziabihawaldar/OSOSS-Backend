<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class UserController extends Controller
{
    public function index(Request $request)
    {
        try
        {
            $users = User::with('companies')->paginate($request->rowsPerPage);
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
            $user->password =bcrypt('123456');
            $user->save();
            return ['status' => 1,'message' => 'success','data' => $user];
        }catch (\Exception $e)
        {
            logger($e);
            return ['status' => 0,'message' => 'error occurred'];
        }

    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'id'=>'required',
            'name'=>'required',
        ]);
        try
        {
            $user = User::find($request->id);
            if($user)
            {
                $user->name = $request->name;
                $user->email = $request->email;
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

    public function show($id)
    {
        try
        {
            $user = User::find($id);
            if($user)
            {
                return ['status' =>1,'message' =>'success','data' => $user];
            }
            return ['status' => 0, 'message' => 'No User Found'];
        }catch (\Exception $e)
        {
            logger($e);
            return ['status' => 0,'message' => 'error occurred' ];
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
