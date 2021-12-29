<?php

namespace App\Http\Controllers;

use App\AddressModel;
use App\BikeModel;
use App\FactorModel;
use App\FactorReceiptModel;
use App\log1Model;
use App\log2Model;
use App\PurchasedModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class StatsController
 * @package App\Http\Controllers
 */
class StatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $purs = PurchasedModel::where('created_at', '>', Carbon::now()->subDay())->get();



        $pursprice = DB::select('call getLastDayPurchased()');
        $pursprice = $pursprice[0]->p;


        $facs = FactorModel::where('created_at', '>', Carbon::now()->subDay())->get();
        $facs = $facs->toArray();
        $res = [];
        foreach ($facs as $fac) {
            $res[] = $fac['id'];
        }
        $facs = FactorReceiptModel::whereIn('factor_id', $res)->get();
        $facsprice = FactorReceiptModel::whereIn('factor_id', $res)->sum('price');

        return view('stats', [
            'facs' => $facs,
            'purs' => $purs,
            'facsprice' => $facsprice,
            'pursprice' => $pursprice,
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showlog()
    {
        log1Model::where('op_time', '<', Carbon::now()->subDay())->delete();
        log2Model::where('op_time', '<', Carbon::now()->subDay())->delete();

        $user = DB::select("select * from customers_log");
        $address = DB::select("select * from addresses_log");
//        dd($user);
        return view('showlog', [
            'address' => $address,
            'user' => $user,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showTables()
    {
        return view('showtables');
    }

    /**
     * @param $id
     */
    public function deleteTables($id)
    {
        switch ($id) {
            case 1:
                AddressModel::truncate();
                break;
            case 2:
                break;
            case 3:
                BikeModel::truncate();
                break;
            case 4:
                break;
            case 5:
                break;
            case 6:
                break;
            case 7:
                FactorModel::truncate();
                break;
            case 8:
                break;
            case 9:
                break;
            case 10:
                break;
            case 11:
                break;

        }
        return redirect('/');

    }

    public function nigga()
    {
        return view('nigga');
    }
}
