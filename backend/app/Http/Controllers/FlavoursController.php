<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Flavours;
use App\Models\Snus;

class FlavoursController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $flavours = Flavours::all();

            return ['flavours' => $flavours];
        } else {
            return ['we could not validate you, please log in and try again' => 400];
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check()){
            $flavour = Flavours::where('id', $id)->first();
            $snuses = Snus::where('flavours_id', $id)->get();

            return ['flavour' => $flavour, 'snuses' => $snuses];
        } else {
            return ['we could not validate you, please log in and try again' => 400];
        }
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
