<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $items = Shop::all();
        return view('index', ['items' => $items]);
    }

    public function detail($id)
    {
        //パラメータをアクション内で使用出来る
        $detail= Shop::find($id);
        return view('detail')->with('detail', $detail);
    }
}
