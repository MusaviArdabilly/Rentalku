<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vehicle;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $maintenances = Maintenance::whereHas('Vehicle', function($query) use ($request){
            $query->where('brand', 'LIKE', '%'.$request->search.'%')
                  ->where('id_user', Auth::user()->id)
                  ->orWhere('type', 'LIKE', '%'.$request->search.'%')
                  ->where('id_user', Auth::user()->id)
                  ->orWhere('license_plate', 'LIKE', '%'.$request->search.'%')
                  ->where('id_user', Auth::user()->id);
                })->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.pengeluaran.perawatan.perawatan', compact('maintenances'));
    }
    
    public function add(Request $request)
    {
        $vehicles = Vehicle::where('id_user', Auth::user()->id)
                            ->where('vehicle', '=', 'car')
                            ->get();

        return view('admin.pengeluaran.perawatan.tambah_perawatan', compact('vehicles'));
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
        $this->validate($request, [
            'id_vehicle' => 'required',
            'maintenance' => 'required',
            'maintenance_date' => 'required',
            'cost' => 'required'
        ]);

        $maintenance = new Maintenance;
        $maintenance->id_user = Auth::user()->id;
        $maintenance->id_vehicle = Vehicle::where('id', '=', $request->id_vehicle)->value('id');
        $maintenance->maintenance = $request->maintenance;
        $maintenance->maintenance_date = $request->maintenance_date;
        $maintenance->cost = $request->cost;
        $maintenance->save();

        return redirect('/admin/perawatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Maintenance $maintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit(Maintenance $maintenance, $id)
    {
        $maintenance = Maintenance::find($id);
        $vehicles = Vehicle::where('id_user', Auth::user()->id)
                             ->where('vehicle', '=', 'car')
                             ->get();

        return view('admin/pengeluaran/perawatan/ubah_perawatan', compact('maintenance', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maintenance $maintenance, $id)
    {
        $this->validate($request, [
            'id_vehicle' => 'required',
            'maintenance' => 'required',
            'maintenance_date' => 'required',
            'cost' => 'required'
        ]);

        $maintenance = Maintenance::find($id);
        $maintenance->id_user = Auth::user()->id;
        $maintenance->id_vehicle = Vehicle::where('id', '=', $request->id_vehicle)->value('id');
        $maintenance->maintenance = $request->maintenance;
        $maintenance->maintenance_date = $request->maintenance_date;
        $maintenance->cost = $request->cost;
        $maintenance->save();

        return redirect('/admin/perawatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintenance $maintenance, $id)
    {
        $maintenance = Maintenance::find($id);
        $maintenance->delete();

        return redirect('admin/perawatan');
    }
}
