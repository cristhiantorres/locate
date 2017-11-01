<?php

namespace App\Http\Controllers;

use App\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        return view('business.new')->with(['user' => $user]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $business = new Business;
        $business->name = $request->name;
        $business->email = $request->email;
        $business->phone = $request->phone;
        $business->address = $request->address;
        $business->user_id = $request->user_id;

        if ($business->save()) {
            $message = 'Empresa creada';
        }else{
            $message = 'Opss.. Ocurrio algo malo';
        }

        return redirect()->back()->with('status', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        return view('business.edit')->with('business', $business);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {
        $business->name     = $request->name;
        $business->email    = $request->email;
        $business->phone    = $request->phone;
        $business->address  = $request->address;
        
        if ($business->update()) {
            $message = 'Empresa actualizada';
        } else {
            $message = 'Opss.. Ocurrio algo malo';
        }

        return redirect()->back()->with('status', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        if ($business->delete()) {
            $message = 'Empresa eliminada';
        } else {
            $message = 'Opss.. Ocurrio algo malo';
        }

        return redirect()->back()->with('status', $message);
    }
}
