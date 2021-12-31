<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vehicles = Vehicle::where('id_user', Auth::user()->id)->orderBy('brand')
                    ->where('vehicle', '=', 'car')
                    ->when($request->search, function($query) use ($request){
                           $query->where('brand', 'LIKE', '%'.$request->search.'%')->where('id_user', Auth::user()->id)->orderBy('brand')
                           ->orWhere('type', 'LIKE', '%'.$request->search.'%')->where('id_user', Auth::user()->id)->orderBy('brand')
                           ->orWhere('color', 'LIKE', '%'.$request->search.'%')->where('id_user', Auth::user()->id)->orderBy('brand')
                           ->orWhere('transmision', 'LIKE', '%'.$request->search.'%')->where('id_user', Auth::user()->id)->orderBy('brand')
                           ->orWhere('chair_amount', 'LIKE', '%'.$request->search.'%')->where('id_user', Auth::user()->id)->orderBy('brand')
                           ->orWhere('fuel_type', 'LIKE', '%'.$request->search.'%')->where('id_user', Auth::user()->id)->orderBy('brand')
                           ->orWhere('price', 'LIKE', '%'.$request->search.'%')->where('id_user', Auth::user()->id)->orderBy('brand')
                           ->orWhere('tax_payment_date', 'LIKE', '%'.$request->search.'%')->where('id_user', Auth::user()->id)->orderBy('brand')
                           ->orWhere('license_plate_type', 'LIKE', '%'.$request->search.'%')->where('id_user', Auth::user()->id)->orderBy('brand')
                           ->orWhere('license_plate_expiration_date', 'LIKE', '%'.$request->search.'%')->where('id_user', Auth::user()->id)->orderBy('brand');
        })->paginate(10);

        return view('admin.kendaraan.mobil', compact('vehicles'));
        // dd($request->shortBy);
    }

    public function CarStore(Request $request)
    {
        $this->validate($request, [
            'vehicle' => 'required',
            'license_plate' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'color' => 'required',
            'transmision' => 'required',
            'chair_amount' => 'required',
            'fuel_type' => 'required',
            'price' => 'required',
            'tax_payment_date' => 'required',
            'license_plate_type' => 'required',
            'license_plate_expiration_date' => 'required'
        ]);

        $car = new Vehicle;
        $car->id_user = Auth::user()->id;
        $car->vehicle = $request->vehicle;
        $car->license_plate = $request->license_plate;
        $car->brand = $request->brand;
        $car->type =  $request->type;
        $car->color = $request->color;
        $car->transmision =  $request->transmision;
        $car->chair_amount = $request->chair_amount;
        $car->fuel_type =  $request->fuel_type;
        $car->price = $request->price;
        $car->tax_payment_date =  $request->tax_payment_date;
        $car->license_plate_type = $request->license_plate_type;
        $car->license_plate_expiration_date =  $request->license_plate_expiration_date;
        $car->save();

        return redirect('admin/mobil');
    }

    public function CarEdit(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);

        return view('admin/kendaraan/ubah_kendaraan', compact('vehicle'));
    }

    public function CarUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'vehicle' => 'required',
            'license_plate' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'color' => 'required',
            'transmision' => 'required',
            'chair_amount' => 'required',
            'fuel_type' => 'required',
            'price' => 'required',
            'tax_payment_date' => 'required',
            'license_plate_type' => 'required',
            'license_plate_expiration_date' => 'required'
        ]);

        $car = Vehicle::find($id);
        $car->id_user = Auth::user()->id;
        $car->vehicle = $request->vehicle;
        $car->license_plate = $request->license_plate;
        $car->brand = $request->brand;
        $car->type =  $request->type;
        $car->color = $request->color;
        $car->transmision =  $request->transmision;
        $car->chair_amount = $request->chair_amount;
        $car->fuel_type =  $request->fuel_type;
        $car->price = $request->price;
        $car->tax_payment_date =  $request->tax_payment_date;
        $car->license_plate_type = $request->license_plate_type;
        $car->license_plate_expiration_date =  $request->license_plate_expiration_date;
        $car->save();

        return redirect('admin/mobil');
    }

    public function CarDestroy(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();

        return redirect('admin/mobil');
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
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
}
