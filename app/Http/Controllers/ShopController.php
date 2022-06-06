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

        if (isset($search_area)) {
            $shops = Shop::whereHas('area', function($query) use($search_area){
                $query->where('areas.id', 'LIKE', $search_area);
            });
        }

        if (isset($search_category)) {
            $shops = Shop::whereHas('category', function($query) use($search_category){
                $query->where('categories.id', 'LIKE', $search_category);
            });
        }

        if (isset($search_keyword)) {
            $shops = Shop::where('name', 'LIKE',"%{$search_keyword}%");
        }

        $items = $shops->get();
        
        //プルダウン用
        $areas = Area::all();
        $categories = Category::all();

        return view('index', compact('items', 'search_keyword', 'search_area', 'search_category', 'areas', 'categories'));
    }
}

