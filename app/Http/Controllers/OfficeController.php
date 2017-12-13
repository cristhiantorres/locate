<?php

namespace App\Http\Controllers;

use App\Office;
use App\Business;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      $business = Business::find($id);
      $offices = $business->offices()->get();
      return view('office.index',['offices' => $offices, 'business' => $business]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $business = Business::find($id);
      return view('office.new')->with('business',$business);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $office = new Office;
      $office->name        = $request->input('name');
      $office->business_id = $request->input('business_id');
      $office->email       = $request->input('email');
      $office->phone       = $request->input('phone');
      $office->address     = $request->input('address');
      $office->latitude    = $request->input('latitude');
      $office->longitude   = $request->input('longitude');

      if ($office->save()) {
        $message = 'Oficina creada';
      }else{
        $message = 'Opss.. Ocurrio algo malo';
      }

      return redirect()->back()->with('status',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $office)
    {
      $office->name        = $request->input('name');
      $office->email       = $request->input('email');
      $office->phone       = $request->input('phone');
      $office->address     = $request->input('address');

      if ($office->update()) {
        $message = 'Oficina actualizada';
      }else{
        $message = 'Opss.. Ocurrio algo malo';
      }

      return redirect()->back()->with('status',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
      if ($office->delete()) {
        flash('Oficina eliminada correctamente','success');
      }else{
        flash('Opss.. Ocurrio algo malo','danger');
      }

      return back();
    }
  }
