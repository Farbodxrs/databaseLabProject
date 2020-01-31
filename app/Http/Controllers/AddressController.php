<?php

namespace App\Http\Controllers;

use App\AddressModel;
use Illuminate\Http\Request;

/**
 * Class AddressController
 * @package App\Http\Controllers
 */
class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userid)
    {
        $addresses = AddressModel::where('user_id', $userid)->get();
        dd($addresses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\AddressModel $addressModel
     * @return \Illuminate\Http\Response
     */
    public function show(AddressModel $addressModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\AddressModel $addressModel
     * @return \Illuminate\Http\Response
     */
    public function edit(AddressModel $addressModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\AddressModel $addressModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AddressModel $addressModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\AddressModel $addressModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddressModel $addressModel)
    {
        //
    }
}
