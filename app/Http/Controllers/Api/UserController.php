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
use Illuminate\Support\Facades\DB;
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
    private function getPlaceTop(){
        $user = ZikirCount::query()->whereDate('created_at', today())->with('user')
            ->select('user_id', DB::raw('SUM(count) as total_today'))
            ->selectRaw('ROW_NUMBER() OVER(ORDER BY SUM(count) desc) AS row_num')
            ->groupBy('user_id')
            ->orderBy('total_today', 'ASC')
            ->get();


        $after = ZikirCount::query()->whereDate('created_at', today())->pluck('user_id')->unique()->count();

        $user = $user->where('user_id', auth()->user()->id);
        return $user->first()->row_num ?? $after + 1;
    }

    public function getInfo(){
        $data['user'] = \auth()->user();
        $data['goal'] = UserGoal::query()->where('user_id', $data['user']->id)->first()->goal ?? null;
        $data['today_count'] = intval(ZikirCount::query()->where('user_id', auth()->user()->id)->whereDate('created_at', today())->sum('count'));
        $data['place_on_top'] = $this->getPlaceTop();
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
