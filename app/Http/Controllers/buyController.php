<?php

namespace App\Http\Controllers;

use App\ProductModel;
use App\PurchasedModel;
use App\ShopModel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

/**
 * Class buyController
 * @package App\Http\Controllers
 */
class buyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $shops = ShopModel::where('is_active', 1)->get('id')->toArray();
        $activeShops = [];
//        dd($shops);
        foreach ($shops as $shop) {
//            dd($shop['id']);
            $activeShops[] = $shop['id'];
        }
        $items = ProductModel::whereIn('shop_id', $activeShops)->get();

        return view('buy', [
            'items' => $items,
        ]);
    }


    /**
     * @param $id
     */
    public function buy($id)
    {
        $product = ProductModel::find($id);
        $shop = ShopModel::find($product->shop_id);
        $item = new PurchasedModel();
        $item->product_name = $product->name;
        $item->price = $product->price;
        $item->shop_name = $shop->name;
        $item->created_at = Carbon::now();
        $item->save();
        return redirect('/');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * @return Factory|View
     */
    public function show()
    {
        $items = PurchasedModel::all();
        return view('purchased', [
            'items'=>$items,
        ]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
