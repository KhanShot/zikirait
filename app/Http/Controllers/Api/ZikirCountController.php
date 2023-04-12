<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\TJsonResponse;
use App\Http\Traits\Utils;
use App\Models\UserGoal;
use App\Models\ZhumaLive;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ZikirCount;
use Illuminate\Support\Facades\DB;

class ZikirCountController extends Controller
{
    use TJsonResponse;
    public function addCount(Request $request){
        ZikirCount::query()->create([
                'user_id' => auth()->user()->id,
                'created_at' => $request->get('date'),
                'count' => $request->get('count', null)]);


        return $this->successResponse(Utils::$MESSAGE_SUCCESS_ADDED);
    }

    public function getToday(){
        $count = ZikirCount::query()->where('user_id', auth()->user()->id)->whereDate('created_at', Carbon::today())->sum('count');

        return $this->successResponse(null, ['count' => $count, 'now' => Carbon::today()]);
    }

    public function getZhuma(){
        $zhuma = ZhumaLive::query()->get();

        return $this->successResponse(null, ['lives' => $zhuma]);
    }

    public function getTopForToday(){
         $data = ZikirCount::query()->whereDate('created_at', today())->with('user')
             ->select('user_id', DB::raw('SUM(count) as total_today'))
             ->selectRaw('ROW_NUMBER() OVER() AS row_num')
             ->groupBy('user_id')
             ->orderBy('total_today', 'DESC')
             ->limit(10)
             ->get();

        $user = ZikirCount::query()->whereDate('created_at', today())->with('user')
            ->select('user_id', DB::raw('SUM(count) as total_today'))
            ->selectRaw('ROW_NUMBER() OVER() AS row_num')
            ->groupBy('user_id')
//            ->where('user_id', 3)
            ->orderBy('total_today', 'DESC')
            ->get();


        $user = $user->where('user_id', 3);

         $data = $data->transform(function ($value){
             return [
                 'total_today' => $value->total_today,
                 'user_name' => $value->user->name,
                 'user_id' => $value->user->id,
                 'row_num' => $value->row_num,
             ];
         });

         return array('top' => $data, 'user_top_place' => $user['1']->row_num);
    }

    public function addGoal(Request $request){
        UserGoal::query()->create([
            'user_id' => auth()->user()->id,
            'goal' => $request->get('goal')
        ]);

        return $this->successResponse(Utils::$MESSAGE_SUCCESS_ADDED);
    }
    public function getStats(Request $request){

        if ($request->get('period') == 'week'){
            $zikir = ZikirCount::query()
                ->where('created_at', '>=', \Carbon\Carbon::now()->subWeek())
                ->groupBy('date')
                ->orderBy('date', 'DESC')
                ->get(array(
                    DB::raw('Date(created_at) as date'),
                    DB::raw('sum(count) as "total_count"')
                ));

            return $zikir;
        }

        elseif ($request->get('period') === 'year' ){

            return  ZikirCount::query()->select(

                DB::raw("(sum(count)) as total_count"),
                DB::raw("(DATE_FORMAT(created_at, '%m-%Y')) as date")
            )
                ->where('user_id', auth()->user()->id)
                ->orderBy('created_at')
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
                ->get();;
        }

        return [];
    }

}
