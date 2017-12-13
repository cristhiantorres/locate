<?php

namespace App\Http\Controllers;

use App\Product;
use App\Office;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

      $office = Office::find($id);

      $products = $office->products()->get();

      return view('product.index',['office' => $office, 'products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

      $office = Office::find($id);

      return view('product.new',['office' => $office]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $product = new Product;


      $product->name        = $request->name;

      $product->office_id   = $request->office_id;

      $product->description = $request->description;

      $product->price       = $request->price;



      if ($product->save()) {

        $message = 'Producto creado';

      } else {

        $message = 'Opss.. Ocurrio algo malo';

      }

      return redirect()->back()->with('status',$message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

      $product->name        = $request->name;

      $product->description = $request->description;

      $product->price       = $request->price;



      if ($product->update()) {

        $message = 'Producto actualizado';

      } else {

        $message = 'Opss.. Ocurrio algo malo';

      }

      return back()->with('status',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
      if ($product->delete()) {

        $message = 'Producto eliminado correctamente';

      } else {

        $message = 'Opss.. Ocurrio algo malo';

      }

      return back()->with('status',$message);
    }
  }
