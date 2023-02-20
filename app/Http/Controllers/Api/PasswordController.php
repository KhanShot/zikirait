<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\UpdatePasswordRequest;

use App\Http\Traits\TJsonResponse;
use App\Http\Traits\Utils;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    use TJsonResponse;
    public function check(CheckPasswordRequest $request){
        $user = User::query()
            ->where('username', $request->get('username'))
            ->where('phone', $request->get('phone'))
            ->first();

        if ($user)
            return $this->successResponse(Utils::$MESSAGE_SUCCESS);

        return $this->failedResponse(Utils::$MESSAGE_DATA_NOT_FOUND, 404);
    }

    public function reset(ResetPasswordRequest $request){
        $user = User::query()
            ->where('username', $request->get('username'))
            ->where('phone', $request->get('phone'))
            ->first();

        if (!$user)
            return $this->failedResponse(Utils::$MESSAGE_DATA_NOT_FOUND, 404);


        $user->password = Hash::make($request->get('password'));
        $user->save();

        return $this->successResponse(Utils::$MESSAGE_SUCCESS_UPDATED);

    }

    public function update(UpdatePasswordRequest $request)
    {
        $user = User::query()->find(auth()->user()->id);

        $user->password = Hash::make($request->get('password'));
        $user->save();

        return $this->successResponse(Utils::$MESSAGE_SUCCESS_UPDATED);

    }
}
