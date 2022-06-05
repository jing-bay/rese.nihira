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
        $search_keyword = $request->input('search_keyword');

        //テーブル結合
        $query = Shop::select('shops.id' ,'shops.name',  'shops.overview' , 'shops.url' , 'areas.name as area_name' , 'categories.name as category_name' )
            ->join('areas', 'shops.area_id', '=', 'areas.id')
            ->join('categories', 'shops.category_id', '=', 'categories.id');

        //検索結果反映
        if(!empty($search_area)) {
            $query->where('areas.id', 'LIKE', $search_area);
        }

        if(!empty($search_category)) {
            $query->where('categories.id', 'LIKE', $search_category);
        }

        if(!empty($search_keyword)) {
            $query->where('shops.name', 'LIKE', "%{$search_keyword}%");
        }
        
        $items = $query->get();

        //プルダウン用
        $areas = Area::all();
        $categories = Category::all();

        return view('index', compact('items', 'search_keyword', 'search_area', 'search_category', 'areas', 'categories'));
    }
}

