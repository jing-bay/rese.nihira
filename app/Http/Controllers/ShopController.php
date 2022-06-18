<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Area;
use App\Models\Category;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        $areas = Area::all();
        $categories = Category::all();

        $id = Auth::id();
        $favorites = Favorite::where('user_id',$id)->get();

        return view('index', ['shops' => $shops, 'areas' => $areas, 'categories' => $categories, 'favorites' => $favorites, 'id'=>$id]);
    }

    public function detail($shop_id) 
    {
        $shop = Shop::find($shop_id);
        $id = Auth::id();
        return view('detail', ['shop' => $shop, 'id'=>$id ]);
    }

    public function search(Request $request) 
    {
        $query = Shop::query();

        $search_area = $request->search_area;
        $search_category = $request->search_category;
        $search_keyword = $request->search_keyword;

        if(!empty($search_area)) {
            $query->where('area_id', $search_area);
        }
        if(!empty($search_category)) {
            $query->where('category_id', $search_category);
        }
        if(!empty($search_keyword)) {
            $query->where('name', 'like', '%'.$search_keyword.'%');
        }

        $shops = $query->get();
        
        //プルダウン用
        $areas = Area::all();
        $categories = Category::all();

        $id = Auth::id();
        $favorites = Favorite::where('user_id',$id)->get();

        return view('index', compact('shops', 'search_keyword', 'search_area', 'search_category', 'areas', 'categories', 'id', 'favorites'));
    }
}
