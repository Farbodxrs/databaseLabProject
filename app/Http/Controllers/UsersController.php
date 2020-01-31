<?php

namespace App\Http\Controllers;

use App\UserModel;
use Illuminate\Http\Request;
use Carbon\Carbon;

/**
 * Class UsersController
 * @package App\Http\Controllers
 */
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $all = UserModel::all();
        foreach ($all as $item) {

            $item->age = $this->getAge($item->date_of_birth);

        }
        return view('users', ['users' => $all]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showCreate()
    {
        return view('create_user');

    }

    /**
     * @param Request $request
     */
    public function create(Request $request)
    {
        $user = new UserModel();
        $user->first_name = $request->input('firstname');
        $user->last_name = $request->input('lastname');
        $user->national_code = $request->input('nationalcode');
        $user->mobile_phone = $request->input('mobile');
        $user->date_of_birth = $request->input('dob');
        $user->created_at = Carbon::now();
        $user->save();
        return view('edit_user', [
            'user' => $user,
            'text' => 'success create'
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $user = UserModel::whereid($id)->first();

        return view('edit_user', ['user' => $user]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     */
    public function update(Request $request, $id)
    {
        $user = UserModel::find($id);
        $user->first_name = $request->input('firstname');
        $user->last_name = $request->input('lastname');
        $user->national_code = $request->input('nationalcode');
        $user->mobile_phone = $request->input('mobile');
        $user->date_of_birth = $request->input('dob');
        $user->updated_at = Carbon::now();
        $user->save();
        return view('edit_user', [
            'user' => $user,
            'text' => 'success update'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        UserModel::destroy($id);
        return $this->index();
    }

    /**
     * @param $dob
     */
    private function getAge($dob)
    {
        return Carbon::parse($dob)->diffInYears(Carbon::now()) + 1;

    }
}
