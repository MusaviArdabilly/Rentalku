<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Corporation;
use App\Models\User;
use App\Models\Location;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUser()
    {
        $userdata = Auth::user();
        $location = Location::where('id_user', Auth::user()->id)->first();

        return view('user.profil.profil', compact('userdata', 'location'));
    }
    

    public function editUser(Request $request)
    {
        $userdata = Auth::user();
        $provinces = Province::all();
        $location = Location::where('id_user', Auth::user()->id)->first();

        return view('user.profil.ubah_profil', compact('userdata', 'provinces', 'location'));
    }

    public function updateUser(Request $request)
    {
        $user = User::find(Auth::user()->id);

        // if($request->picture){
        //     $picturename = Auth::user()->username.'-profile-'.date('Ymdhis').'.'.$request->picture->getClientOriginalExtension();
        //     $request->picture->move('img/profile', $picturename);
        //     $user->picture = $picturename;
        //     $user->save();
        // }

        if($request->picture){
            $this->validate($request, [
                'picture' => 'required|image|max:4000'
            ]);
            $picturename = 'profile-'.Auth::user()->username.'.'.$request->picture->getClientOriginalExtension();
            $path = Storage::putFileAs('/images/profile/', $request->file('picture'), $picturename);
            $user->picture = $picturename;
            $user->save();
        }

        if($request->name){
            $this->validate($request, [
                'name' => 'required',
                'username' => 'required',
                'email' => 'required',
                'phone_number' => 'required'
            ]);

            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->nik = $request->nik;
            $user->save();
        }

        $id_location = Location::where('id_user', '=', Auth::user()->id)->value('id');

        if ($request->provinces != 0){
            if (Location::where('id_user', Auth::user()->id)->exists()) {
                $location = Location::find($id_location);
                $location->id_user = Auth::user()->id;
                $location->id_province = $request->provinces;
                $location->id_regency = $request->regencies;
                $location->id_district = $request->districts;
                $location->id_village = $request->villages;
                $location->street = $request->street;
                $location->save();
            }else{
                $location = new Location;
                $location->id_user = Auth::user()->id;
                $location->id_province = $request->provinces;
                $location->id_regency = $request->regencies;
                $location->id_district = $request->districts;
                $location->id_village = $request->villages;
                $location->street = $request->street;
                $location->save();
            }
        }

        if ($request->password) {
            $validate = $request->validate([
                'old_password'  => ['required'],
                'password'  => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->password);
                $user->save();

                return redirect('/u/{username}')
                    ->with('success', 'Password updated successfully');
            }
        }
        
        return redirect('/u/{username}');
    }

    public function joinAgen(Request $request, $id)
    {
        $user = User::find($id);
        $user->role = 'agent';
        $user->save();

        $corporation = new Corporation;
        $corporation->id_user = Auth::user()->id;
        $corporation->name = 'Agen'.date('Ymdhis');
        $corporation->save();

        return redirect('/a/{username}');
    }

    //agen

    public function indexAgent(Request $request)
    {
        $corporation = Corporation::where('id_user', Auth::user()->id)->first();
        $userdata = Auth::user();
        $corp_location = Location::where('id_user', Auth::user()->id)->first();

        return view('admin.profil.profil', compact('userdata', 'corporation', 'corp_location'));
    }

    public function editAgent(Request $request)
    {
        $corporation = Corporation::where('id_user', Auth::user()->id)->first();
        $userdata = Auth::user();
        $provinces = Province::all();
        $location = Location::where('id_user', Auth::user()->id)->first();

        return view('admin.profil.ubah_profil', compact('corporation', 'userdata', 'provinces', 'location'));
    }

    public function updateAgent(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
            
        // dd($request->all());
        $corporation = Corporation::where('id_user', Auth::user()->id)->first();
        $corporation->name = $request->name;
        // $corporation->address = $request->address;
        $corporation->description = $request->description;
        $corporation->whatsapp = $request->whatsapp;
        $corporation->status = $request->status;
        $corporation->save();

        $user = User::find(Auth::user()->id);
        if( $request->picture){
            $picturename = Auth::user()->username.'-profile-'.date('Ymdhis').'.'.$request->picture->getClientOriginalExtension();
            $request->picture->move('img/profile', $picturename);
            $user->picture = $picturename;
        }
        $user->save();

        return redirect('/a/{username}');
    }

    public function regencies()
    {
        $provinces_id = request()->get('province_id');
        $regencies = Regency::where('province_id', '=', $provinces_id)->get();
        return response()->json($regencies);
    }

    public function districts()
    {
        $regencies_id = request()->get('regencies_id');
        $districts = District::where('regency_id', '=', $regencies_id)->get();
        return response()->json($districts);
    }

    public function villages()
    {
        $districts_id = request()->get('districts_id');
        $villages = Village::where('district_id', '=', $districts_id)->get();
        return response()->json($villages);
    }

    //admin

    public function indexAdminUser(Request $request){
        $listuser = User::paginate(10);
        
        return view('admin.admin.user_management', compact('listuser')); 
    }

    public function indexAdminCorporation(Request $request){
        $listcorp = Corporation::paginate(10);
        
        return view('admin.admin.corp_management', compact('listcorp')); 
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
