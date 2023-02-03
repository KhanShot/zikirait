<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\TJsonResponse;
use App\Http\Traits\Utils;
use App\Models\ZhumaLive;
use Illuminate\Http\Request;
use App\Models\ZikirCount;
use Illuminate\Support\Facades\DB;

class ZikirCountController extends Controller
{
    use TJsonResponse;
    public function addCount(Request $request){
        ZikirCount::query()->create(
            ['user_id' => auth()->user()->id,
                'count' => $request->get('count', null)]);


        return $this->successResponse(Utils::$MESSAGE_SUCCESS_ADDED);
    }

    public function getToday(){
        $count = ZikirCount::query()->where('user_id', auth()->user()->id)->whereDate('created_at', today())->sum('count');

        return $this->successResponse(null, ['count' => $count]);
    }

    public function getZhuma(){
        $zhuma = ZhumaLive::query()->get();

        return $this->successResponse(null, ['lives' => $zhuma]);
    }

    public function getTopForToday(){
         $data = ZikirCount::query()->whereDate('created_at', today())->with('user')->select('user_id', DB::raw('SUM(count) as total_today'))
             ->groupBy('user_id')
             ->orderBy('total_today', 'DESC')
             ->limit(10)
             ->get();

         return $data->transform(function ($value){
             return [
                 'total_today' => $value->total_today,
                 'user_name' => $value->user->name,
                 'user_id' => $value->user->id
             ];
         });
    }


}
