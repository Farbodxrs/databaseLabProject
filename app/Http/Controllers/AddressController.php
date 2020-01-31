<?php

namespace App\Http\Controllers;

use App\AddressModel;
use App\UserModel;
use Illuminate\Contracts\View\Factory;
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
     * @return Factory|\Illuminate\View\View
     */
    public function index($userid)
    {
        $addresses = AddressModel::where('user_id', $userid)->get();
        $user = UserModel::where('id', $userid)->first();
        $fname = $user->first_name;
        $lname = $user->last_name;

        return view('address', [
            'address' => $addresses,
            'name' => $fname . $lname,
            'user_id' => $userid
        ]);
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
     * @return Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $add = new AddressModel();
        $add->user_id = $request->input('user_id');
        $add->name = $request->input('name');
        $add->phone = $request->input('phone');
        $add->address = $request->input('address');
        $add->save();
        return $this->index($request->input('user_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\AddressModel $addressModel
     * @return Factory|\Illuminate\View\View
     */
    public function show($id)
    {

        $add = AddressModel::where('id', $id)->first();

        return view('oneaddress', [
            'address' => $add
        ]);

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
     * @return Factory|\Illuminate\View\View
     */
    public function update(Request $request, $id)
    {
        $address = AddressModel::find($id);
        $address->name = $request->input('name');
        $address->address = $request->input('address');
        $address->phone = $request->input('phone');
        $address->save();
        return $this->index($address->user_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\AddressModel $addressModel
     * @return Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function destroy($id)
    {
        $add = AddressModel::where('id', $id)->first();
        AddressModel::destroy($id);
        return $this->index($add->user_id);
    }
}
