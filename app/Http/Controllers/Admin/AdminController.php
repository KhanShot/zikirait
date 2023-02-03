<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ZikirCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard(){
        $zikir = ZikirCount::query();
        $data['users'] = User::query()->where('is_admin','!=', 1)->count();
        $data['zikir_total'] = $zikir->sum('count');
        $data['zikir_today'] = $zikir->whereDate('created_at', today())->sum('count');

        return view('admin.pages.dashboard', compact('data'));
    }

    public function users(){
        $users = User::query()->with(['zikir'=> function($q){
            $q->whereDate('created_at', today())->with('user')->select('user_id', DB::raw('SUM(count) as total_today'))
                ->groupBy('user_id')->first();
        }])->withSum('zikir', 'count')->where('is_admin', '!=',1)->get();

        return view('admin.pages.users', compact('users'));
    }



}
