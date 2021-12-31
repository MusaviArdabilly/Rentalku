<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vehicle;
use App\Models\Product;
use App\Models\Schedule;
use App\Models\Transaction;
use App\Models\Tax;
use App\Models\Maintenance;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userdata = Auth::user();
    	$totalvehicle = Vehicle::where('id_user', Auth::user()->id)->where('vehicle', 'car')->count();
    	$totalproduct = Product::where('id_user', Auth::user()->id)->count();

    	$totaltransaction = Transaction::where('id_user', Auth::user()->id)->whereHas('Schedule.Vehicle', function($query){
                                                                                        $query->where('vehicle', 'car');})->count();
        $totaltax = Tax::where('id_user', Auth::user()->id)->whereHas('Vehicle', function($query){
                                                                                        $query->where('vehicle', 'car');})->count();
        $totalmaintenance = Maintenance::where('id_user', Auth::user()->id)->whereHas('Vehicle', function($query){
                                                                                        $query->where('vehicle', 'car');})->count();

    	$sumtransaction = Transaction::where('id_user', Auth::user()->id)->sum('income');
    	$sumtax = Tax::where('id_user', Auth::user()->id)->sum('cost');
    	$summaintenance = Maintenance::where('id_user', Auth::user()->id)->sum('cost');
        $sumoutcome = $sumtax + $summaintenance;

        return view('admin.index', compact('userdata', 'totalvehicle', 'totalproduct', 'totaltransaction', 'totaltax', 'totalmaintenance', 'sumtransaction', 'sumtax', 'summaintenance', 'sumoutcome'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
