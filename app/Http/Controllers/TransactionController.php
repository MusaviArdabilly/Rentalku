<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;
use App\Models\Vehicle;
use App\Models\User;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transactions = Transaction::whereHas('Schedule.Vehicle', function($query) use ($request){
            $query->where('brand', 'LIKE', '%'.$request->search.'%')
                  ->where('id_user', Auth::user()->id)
                  ->orWhere('type', 'LIKE', '%'.$request->search.'%')
                  ->where('id_user', Auth::user()->id)
                  ->orWhere('license_plate', 'LIKE', '%'.$request->search.'%')
                  ->where('id_user', Auth::user()->id);
                })->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.pemasukan.transaksi', compact('transactions'));
    }

    public function add(Request $request)
    {
        $vehicles = Vehicle::where('id_user', Auth::user()->id)
                             ->where('vehicle', '=', 'car')
                             ->get();

        return view('admin.pemasukan.tambah_transaksi', compact('vehicles'));
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
            'time_start' => 'required',
            'time_finish' => 'required',
            'income' => 'required'
        ]);

        $schedule = new Schedule;
        $schedule->id_user = Auth::user()->id;
        $schedule->id_vehicle = Vehicle::where('id', '=', $request->id_vehicle)->value('id');
        $schedule->time_start = $request->time_start;
        $schedule->time_finish = $request->time_finish;
        $schedule->save();

        $transaction = new Transaction;
        $transaction->id_user = Auth::user()->id;
        $transaction->id_schedule = Schedule::where('time_start', $request->time_start)->value('id');
        $transaction->income = $request->income;
        $transaction->save();

        return redirect('/admin/transaksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction, $id)
    {
        $transaction = Transaction::find($id);
        $vehicles = Vehicle::where('id_user', Auth::user()->id)
                             ->where('vehicle', '=', 'car')
                             ->get();

        return view('admin/pemasukan/ubah_transaksi', compact('transaction', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction, $id)
    {
        $this->validate($request, [
            'id_vehicle' => 'required',
            'time_start' => 'required',
            'time_finish' => 'required',
            'income' => 'required'
        ]);

        $schedule = Schedule::find($id);
        $schedule->id_user = Auth::user()->id;
        $schedule->id_vehicle = Vehicle::where('id', '=', $request->id_vehicle)->value('id');
        $schedule->time_start = $request->time_start;
        $schedule->time_finish = $request->time_finish;
        $schedule->save();

        $transaction = Transaction::find($id);
        $transaction->id_user = Auth::user()->id;
        $transaction->id_schedule = Schedule::where('time_start', $request->time_start)->value('id');
        $transaction->income = $request->income;
        $transaction->save();

        return redirect('/admin/transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction, $id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();

        return redirect('admin/transaksi');
    }

    public function done(Request $request, $id)
    {
        $schedule = Schedule::find($id);
        $schedule->time_return = now();
        $schedule->save();

        return redirect('admin/transaksi');
    }
}
