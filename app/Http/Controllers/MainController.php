<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Location;
use App\Models\Province;
use App\Models\Regency;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::groupBy('id_regency')->get();
        return view('user.index', compact('locations'));
    }
    
    public function search(Request $request)
    {
        $locations = Location::groupBy('id_regency')->get();

        $location = $request->search;
        $start_date = $request->start_date;
        $start_time = $request->start_time;
        $finish_date = $request->finish_date;
        $finish_time = $request->finish_time;
        
        $products = Product::whereHas('Location.Regency', function($query) use ($request){
                    $query->where('name', 'LIKE', '%'.$request->search.'%');
        })->orderBy('created_at', 'desc')->paginate(10);

        return view('user.hasil_pencarian', compact('products', 'location', 'start_date', 'start_time', 'finish_date', 'finish_time', 'locations'));
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
