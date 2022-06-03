<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Area;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $items = Shop::all();
        $areas = Area::all();
        $categories = Category::all();
        return view('index', ['items' => $items,'areas' => $areas,'categories' => $categories]);
    }

    public function detail($shop_id) 
    {
        $shop = Shop::find($shop_id);
        return view('detail' , ['shop' => $shop]);
    }

    public function search(Request $request) 
    {
        $search_area = $request->input('search_area');
        $search_category = $request->input('search_category');
        $keyword = $request->input('keyword');

        $query = Shop::query();
        //テーブル結合
        $query->join('areas', function ($query) use ($request) {
            $query->on('shops.area_id', '=', 'areas.id');
            })->join('categories', function ($query) use ($request) {
            $query->on('shops.category_id', '=', 'categories.id');
            });

        //検索結果反映//
        if(!empty($search_area)) {
            $query->where('areas.name', 'LIKE', $search_area);
        }

        if(!empty($search_category)) {
            $query->where('categories.name', 'LIKE', $search_category);
        }

        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }
        
        //この引渡し方がダメ？？？//
        $items = $query->get();

        //プルダウン用//
        $areas = Area::all();
        $categories = Category::all();

        return view('index', compact('items', 'keyword', 'search_area', 'search_category', 'areas', 'categories'));
    }
}

