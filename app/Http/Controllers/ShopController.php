<?php

namespace App\Http\Controllers;

use App\ShopModel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class ShopController
 * @package App\Http\Controllers
 */
class ShopController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $shops = ShopModel::all();
        return view('shops', [
            'shops' => $shops
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create(Request $request)
    {
        $shop = new ShopModel();
        $shop->name = $request->input('name');
        $shop->is_active = $request->input('active');
        $shop->save();
        return $this->index();

    }


    /**
     * Display the specified resource.
     *
     * @return Factory|View
     */
    public function show($id)
    {

        $shop = ShopModel::find($id);
        return view('oneshop', ['shop' => $shop]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function update(Request $request, $id)
    {


        $shop = ShopModel::find($id);
        $shop->name = $request->input('name');
        $shop->is_active = $request->input('active');
        $shop->save();
        return $this->index();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Factory|View
     */
    public function destroy($id)
    {
        ShopModel::destroy($id);
        return $this->index();
    }
}
