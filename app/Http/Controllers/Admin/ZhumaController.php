<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ZhumaLive;
use Illuminate\Http\Request;

class ZhumaController extends Controller
{
    public function index(){
        $zhumaLives = ZhumaLive::all();
        return view('admin.zhuma.index', compact('zhumaLives'));
    }

    public function create(){
        return view('admin.zhuma.create');
    }
    public function edit($zhuma_id){
        $zhuma = ZhumaLive::query()->find($zhuma_id);
        if (!$zhuma)
            return back()->with('error', '404');
        return view('admin.zhuma.edit', compact('zhuma'));
    }


    public function store(Request $request){
        ZhumaLive::query()->create([
            'title' => $request->get('title'),
            'link' => $request->get('link'),
            'date' => $request->get('date'),
            'live' => $request->live ? 1 : 0,
        ]);

        return redirect()->route('zhuma');
    }

    public function update(Request $request, $zhuma_id){
        $zhuma = ZhumaLive::query()->find($zhuma_id);
        if (!$zhuma)
            return back()->with('error', '404');

        $zhuma->update([
            'title' => $request->get('title'),
            'link' => $request->get('link'),
            'date' => $request->get('date'),
            'live' => $request->live ? 1 : 0,
        ]);

        return redirect()->route('zhuma');

    }

    public function delete($zhuma_id){
        $zhuma = ZhumaLive::query()->find($zhuma_id);
        if (!$zhuma)
            return back()->with('error', '404');


        $zhuma->delete();
        return redirect()->route('zhuma');

    }


}
