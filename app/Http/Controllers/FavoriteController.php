<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function store()
    {
        $items = Shop::all();
        $areas = Area::all();
        $categories = Category::all();
        return view('index', ['items' => $items,'areas' => $areas,'categories' => $categories]);
    }

    public function delete()
    {
        $items = Shop::all();
        $areas = Area::all();
        $categories = Category::all();
        return view('index', ['items' => $items,'areas' => $areas,'categories' => $categories]);
    }


}
