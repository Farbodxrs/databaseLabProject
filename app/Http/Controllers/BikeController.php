<?php

namespace App\Http\Controllers;

use App\BikeModel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

/**
 * Class BikeController
 * @package App\Http\Controllers
 */
class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $bikes = BikeModel::all();
        return view('bikes', [
            'bikes' => $bikes,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create(Request $request)
    {
        $bike = new BikeModel();
        $bike->first_name = $request->input('fname');
        $bike->last_name = $request->input('lname');
        $bike->national_code = $request->input('national_code');
        $bike->phone = $request->input('phone');
        $bike->save();
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
     * @param BikeModel $bikeModel
     * @return Factory|View
     */
    public function show($id)
    {
        $bike = BikeModel::find($id);
        return view('onebike', ['bike' => $bike]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param BikeModel $bikeModel
     * @return Response
     */
    public function edit(BikeModel $bikeModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function update(Request $request, $id)
    {
        $bike = BikeModel::find($id);
        $bike->first_name = $request->input('fname');
        $bike->last_name = $request->input('lname');
        $bike->national_code = $request->input('national_code');
        $bike->phone = $request->input('phone');
        $bike->save();
        return $this->index();  //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Factory|View
     */
    public function destroy($id)
    {
        BikeModel::destroy($id);
        return $this->index();
    }
}
