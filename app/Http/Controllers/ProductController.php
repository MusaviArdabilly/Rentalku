<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Vehicle;
use App\Models\Corporation;
use App\Models\Location;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::where('id_user', Auth::user()->id)
                    ->when($request->search, function($query) use ($request){
                           $query->where('title', 'LIKE', '%'.$request->search.'%')
                           ->orWhere('description', 'LIKE', '%'.$request->search.'%')
                           ->orWhere('brand', 'LIKE', '%'.$request->search.'%');
        })->paginate(10);

        return view('admin.produk.produk', compact('products'));
    }

    public function add(Request $request)
    {
        $vehicles = Vehicle::where('id_user', Auth::user()->id)
                             ->where('vehicle', '=', 'car')
                             ->get();

        return view('admin.produk.tambah_produk', compact('vehicles'));
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
            'title' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $id_location = Location::where('id_user', '=', Auth::user()->id)->value('id');

        $product = new Product;
        $product->id_user = Auth::user()->id;
        $product->id_vehicle = Vehicle::where('id', '=', $request->id_vehicle)->value('id');
        $product->id_corporation = Corporation::where('id_user', '=', Auth::user()->id)->value('id');
        $product->id_location = $id_location;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        // if( $request->picture){
        //     $picturename = Auth::user()->username.'-product-'.date('Ymdhis').'.'.$request->picture->getClientOriginalExtension();
        //     $request->picture->move('img/product', $picturename);
        //     $product->picture = $picturename;
        // }
        // $product->save();
        if( $request->picture){
            $this->validate($request, [
                'picture' => 'required|image|max:4000'
            ]);
            $picturename = 'product-'.date('Ymdhis').'-'.Auth::user()->username.'.'.$request->picture->getClientOriginalExtension();
            $path = Storage::putFileAs('/images/product/', $request->file('picture'), $picturename);
            $product->picture = $picturename;
            $product->save();
        }

        return redirect('/admin/produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $product = Product::find($id);
        $vehicles = Vehicle::where('id_user', Auth::user()->id)
        ->where('vehicle', '=', 'car')
        ->get();

        return view('admin.produk.ubah_produk', compact('product', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
        $this->validate($request, [
            'id_vehicle' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        // $user = Auth::find(Auth::user()->id);

        $product = Product::find($id);
        $product->id_user = Auth::user()->id;
        $product->id_vehicle = Vehicle::where('id', '=', $request->id_vehicle)->value('id');
        $product->id_corporation = Corporation::where('id_user', '=', Auth::user()->id)->value('id');
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        if( $request->picture){
            $picturename = Auth::user()->username.'-product-'.date('Ymdhis').'.'.$request->picture->getClientOriginalExtension();
            $request->picture->move('img/product', $picturename);
            $product->picture = $picturename;
        }
        $product->save();

        return redirect('/admin/produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('admin/produk');
    }
}
