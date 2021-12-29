<?php

namespace App\Http\Controllers;

use App\AddressModel;
use App\BikeModel;
use App\FactorModel;
use App\FactorReceiptModel;
use App\FoodModel;
use App\UserModel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class FactorController
 * @package App\Http\Controllers
 */
class FactorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $users = UserModel::all();
        return view('chooseuser', [
            'users' => $users,
        ]);

    }


    /**
     * @param $userid
     * @param $addid
     * @param $bikeid
     */
    public function save($userid, $addid, $bikeid)
    {
        $f = new FactorModel();
        $add = AddressModel::find($addid);
        $f->user_id = $userid;
        $f->address = $add->address;
        $f->bike_id = $bikeid;
        $f->save();
        return $this->showFoods($f->id);
    }


    /**
     * @param $userid
     */
    public function address($userid)
    {
        if ($userid == 0) {
            return view('enteraddress', [
                'userid' => $userid,
            ]);
        }

        $add = AddressModel::where('user_id', $userid)->get();
        return view('chooseaddress', [
            'adds' => $add,
            'userid' => $userid,
        ]);
    }


    /**
     * @param $userid
     * @param $addid
     * @return Factory|View
     */
    public function bike($userid, $addid)
    {
        $bikes = BikeModel::all();
        return view('choosebike', [
            'bikes' => $bikes,
            'userid' => $userid,
            'addid' => $addid,
        ]);
    }


    /**
     * @param $factorid
     * @return Factory|View
     */
    public function showFoods($factorid)
    {
        $foods = FoodModel::where('is_active', 1)->get();
        return view('choosefoods', [
            'foods' => $foods,
            'factorid' => $factorid
        ]);

    }

    /**
     * @param $factorid
     * @param $foodid
     */
    public function addfood($factorid, $foodid)
    {
        $facRec = new FactorReceiptModel();
        $food = FoodModel::find($foodid);
        $facRec->factor_id = $factorid;
        $facRec->price = $food->price;
        $facRec->food_name = $food->name;
        $facRec->save();
        $foods = FoodModel::where('is_active', 1)->get();
        return view('choosefoods', [
            'foods' => $foods,
            'factorid' => $factorid
        ]);
    }

    /**
     * @param $factorid
     */
    public function finish($factorid)
    {
//        dd('DEBUG');
        $receipt = FactorReceiptModel::where('factor_id', $factorid)->get();
        $price = FactorReceiptModel::where('factor_id', $factorid)->sum('price');

        return view('finish', [
            'foods' => $receipt,
            'price' => $price,
        ]);

    }

    /**
     * @param Request $request
     */
    public function enteraddress(Request $request)
    {
        $f = new FactorModel();
        $f->user_id = $request->userid;
        $f->address = $request->address;
        $f->bike_id = BikeModel::where('id', '<', 100)->pluck('id')[0];


        $f->save();
        return $this->showFoods($f->id);
    }
}



