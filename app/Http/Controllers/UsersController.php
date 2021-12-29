<?php

namespace App\Http\Controllers;

use App\FactorModel;
use App\FactorReceiptModel;
use App\UserModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

        return $this->index();

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
//        dd('X');
        $user = UserModel::whereid($id)->first();
        $factors = FactorModel::where('user_id', $id)->get();
//        dd($factors);
        $res = [];
        foreach ($factors as $factor) {
//            dd($factors);
            $res [] = $factor['id'];
        }
//        $receipts = FactorReceiptModel::wherein('factor_id', $res)->get()->groupBy('food_name');
        $receipts = FactorReceiptModel::wherein('factor_id', $res)->groupBy('food_name')->select('food_name',
            DB::raw('count(*) as total'))->orderBy('total','desc')->get();

//        dd($receipts);


        return view('edit_user', [
            'user' => $user,
            'receipts' => $receipts
        ]);

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
