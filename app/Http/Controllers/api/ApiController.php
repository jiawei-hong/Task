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
                'data' => [
                    'id' => $query->id,
                    'username' => $query->username,
                    'api_token' => $query->api_token,
                    'permission' => $query->permission
                ]
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

    public function getUserId($token)
    {
        return User::where('api_token',$token)->first()->id;
    }

    public function getUserPermission($token){
        return User::where('api_token',$token)->first()->permission;
    }

    public function getTasks(Request $request)
    {
        $userId = $this->getUserId($request->input('token'));
        $permission = $this->getUserPermission($request->input('token'));

        if($permission === '管理員'){
            return response()->json([
                'msg' => 'Get All Member Task!',
                'data' => Task::all()
            ]);
        }

        return response()->json([
            'msg' => 'Get Member Task!',
            'data' => Task::where('user_id',$userId)->get()
        ]);
    }

    public function getTask($id)
    {
        $query = Task::where('id',$id)->select('title','content','status')->first();

        if($query->status === 'closed'){
            return response()->json([
                'status' => false,
                'msg' => '此任務已關閉'
            ]);
        }

        return response()->json([
            'status' => true,
            'msg' => 'Get Task Edit Data',
            'data' => [
                'task_title' => $query->title,
                'task_content' => $query->content,
                'task_status' => $query->status
            ]
        ]);
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

    public function updateTask($id,Request $request){
        Task::find($id)->update($request->all());

        return response()->json([
            'msg' => '修改成功'
        ]);
    }

    public function deleteTask($id){
        Task::find($id)->delete();

        return response()->json([
            'msg' => '刪除成功'
        ]);
    }

    public function getUsers()
    {
        return response()->json([
            'msg' => 'Get All Member',
            'data' => User::where('permission','!=','管理員')->get()
        ]);
    }

    public function createUser(Request $request)
    {
        $user = User::create($request->all());

        return response()->json([
            'msg' => '創建成功',
            'data' => $user->id
        ]);
    }

    public function updateUser($id,Request $request)
    {
        User::find($id)->update([
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password'))
        ]);

        return response()->json([
            'msg' => '修改成功',
        ]);
    }

    public function deleteUser($id)
    {
        User::find($id)->delete();

        return response()->json([
            'msg' => '刪除成功',
        ]);
    }
}
