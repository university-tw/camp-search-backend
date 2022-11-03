<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use Illuminate\Http\Request;

class CampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Camp::whereNotNull('approved_at')->whereNotNull('approved_by')->get();
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Camp  $camp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Camp $camp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Camp  $camp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Camp $camp)
    {
        //
    }
}
