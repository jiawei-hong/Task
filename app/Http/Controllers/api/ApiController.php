<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Task;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        $query = User::where('account',$request->input('account'))->first();

        if($query && Hash::check($request->input('password'),$query->password)){
            return response()->json([
                'status' => true,
                'msg' => '登入成功',
                'data' => $query->select('id','username','api_token')->first(),
            ]);
        }

        return response()->json([
            'status' => false,
            'msg' => '登入失敗',
        ]);
    }

    public function logout(Request $request)
    {
        $query = User::where('api_token',$request->input('token'))->first();

        if($query){
            $query->update(['api_token' => Str::random('80')]);

            return response()->json([
                'status' => true,
                'msg' => '登出成功',
            ]);
        }

        return response()->json([
            'status' => false,
            'msg' => '登出失敗',
        ]);
    }

    public function getAllTask()
    {

    }

    public function getTask($id)
    {

    }

    public function createTask(Request $request)
    {
        $task = Task::create($request->all());

        return response()->json([
            'status' => true,
            'msg' => '任務創建成功。',
            'id' => $task->id
        ]);
    }
}
