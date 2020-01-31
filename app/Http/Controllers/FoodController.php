<?php

namespace App\Http\Controllers;

use App\FoodModel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

/**
 * Class FoodController
 * @package App\Http\Controllers
 */
class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $foods = FoodModel::all();
        return view('foods', [
            'foods' => $foods
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create(Request $request)
    {
        $food = new FoodModel();
        $food->name = $request->input('name');
        $food->price = $request->input('price');
        $food->is_active = $request->input('active');
        $food->save();
        return $this->index();

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
     * Display the specified resource.
     *
     * @param FoodModel $foodModel
     * @return Factory|View
     */
    public function show($id)
    {

        $food = FoodModel::find($id);
        return view('onefood', ['food' => $food]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param FoodModel $foodModel
     * @return Response
     */
    public function edit(FoodModel $foodModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param FoodModel $foodModel
     * @return Factory|View
     */
    public function update(Request $request, $id)
    {


        $food = FoodModel::find($id);
        $food->name = $request->input('name');
        $food->price = $request->input('price');
        $food->is_active = $request->input('active');
        $food->save();
        return $this->index();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param FoodModel $foodModel
     * @return Factory|View
     */
    public function destroy($id)
    {
        FoodModel::destroy($id);
        return $this->index();
    }
}
