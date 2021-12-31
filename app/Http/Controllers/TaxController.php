<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vehicle;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $taxs = Tax::whereHas('Vehicle', function($query) use ($request){
            $query->where('brand', 'LIKE', '%'.$request->search.'%')
                  ->where('id_user', Auth::user()->id)
                  ->orWhere('type', 'LIKE', '%'.$request->search.'%')
                  ->where('id_user', Auth::user()->id)
                  ->orWhere('license_plate', 'LIKE', '%'.$request->search.'%')
                  ->where('id_user', Auth::user()->id)
                  ->orWhere('cost', 'LIKE', '%'.$request->search.'%')
                  ->where('id_user', Auth::user()->id);
                })->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.pengeluaran.pajak.pajak', compact('taxs'));
    }

    public function add(Request $request)
    {
        $vehicles = Vehicle::where('id_user', Auth::user()->id)
                             ->where('vehicle', '=', 'car')
                             ->get();

        return view('admin.pengeluaran.pajak.tambah_pajak', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->validate($request, [
            'id_vehicle' => 'required',
            'payment_date' => 'required',
            'cost' => 'required'
        ]);

        $tax = new Tax;
        $tax->id_user = Auth::user()->id;
        $tax->id_vehicle = Vehicle::where('id', '=', $request->id_vehicle)->value('id');
        $tax->payment_date = $request->payment_date;
        $tax->cost = $request->cost;
        $tax->save();

        return redirect('/admin/pajak');
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
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function show(Tax $tax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function edit(Tax $tax, $id)
    {
        $tax = Tax::find($id);
        $vehicles = Vehicle::where('id_user', Auth::user()->id)
                             ->where('vehicle', '=', 'car')
                             ->get();

        return view('admin/pengeluaran/pajak/ubah_pajak', compact('tax', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tax $tax, $id)
    {
        $this->validate($request, [
            'id_vehicle' => 'required',
            'payment_date' => 'required',
            'cost' => 'required'
        ]);

        $tax = Tax::find($id);
        $tax->id_user = Auth::user()->id;
        $tax->id_vehicle = Vehicle::where('id', '=', $request->id_vehicle)->value('id');
        $tax->payment_date = $request->payment_date;
        $tax->cost = $request->cost;
        $tax->save();

        return redirect('/admin/pajak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tax $tax, $id)
    {
        $tax = Tax::find($id);
        $tax->delete();

        return redirect('admin/pajak');
    }
}
