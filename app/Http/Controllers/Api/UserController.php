<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserUpdateProfileRequest;
use App\Http\Services\UserService;
use App\Http\Traits\TJsonResponse;
use App\Http\Traits\Utils;
use App\Models\User;
use App\Models\UserGoal;
use App\Models\ZikirCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    use TJsonResponse;
    public function register(UserRegisterRequest $request, UserService $service){
        $validate = $request->validated();
        $validate['password'] = Hash::make($request->password);
        $validate['is_admin'] = 0;
        $user = User::query()->create($validate);

        $token = $user->createToken("API token")->plainTextToken;

        $data['user'] = $user;
        $data['token'] = $token;
        return $this->successResponse(Utils::$MESSAGE_AUTHENTICATED, $data);
    }

    public function login(UserLoginRequest $request){
        $credentials = $request->only('phone', 'password');

        if (Auth::attempt($credentials)){

            $user = User::query()->find(\auth()->user()->id);

            $data['user'] = $user;
            $data['token'] = $user->createToken("API token")->plainTextToken;

            return $this->successResponse(Utils::$MESSAGE_AUTHENTICATED,$data);

        }else{
            return $this->failedResponse(Utils::$MESSAGE_LOGIN_INCORRECT,400);
        }
    }


    public function getInfo(){
        $data['user'] = \auth()->user();
        $data['goal'] = UserGoal::query()->where('user_id', $data['user']->id)->first()->goal ?? null;
        $data['today_count'] = ZikirCount::query()->where('user_id', auth()->user()->id)->whereDate('created_at', today())->sum('count');

        return $data;
    }


    public function update(UserUpdateProfileRequest $request){

        $user = User::query()->find(\auth()->user()->id);
        $data = array();
        if ($request->has('name'))
            $data['name'] = $request->get('name');
        if ($request->has('phone'))
            $data['phone'] = $request->get('phone');
        if ($request->has('username'))
            $data['username'] = $request->get('username');

        $user->update($data);
        return $this->successResponse(Utils::$MESSAGE_USER_PROFILE_UPDATED);
    }


}
