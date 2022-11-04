<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use Illuminate\Http\Request;

class CampController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Camp[]
     */
    public function index() {
        return Camp::whereNotNull('approved_at')->whereNotNull('approved_by')->orderByDesc('priority')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, Camp $camp) {
        return response()->json($camp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Camp $camp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Camp $camp) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Camp $camp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Camp $camp) {
        //
    }

    /**
     * Let user add a camp to favorite list
     */
    public function addFavorite(Request $request, Camp $camp) {
        $user = $request->user();
        $user->favoriteCamps()->attach($camp);
        return response()->json(['message' => 'success']);
    }

    /**
     * List user's favorite list
     */
    public function listFavorite(Request $request) {
        $user = $request->user();
        return response()->json($user->favoriteCamps);
    }

    /**
     * remove a camp from user's favorite list
     */
    public function removeFavorite(Request $request, Camp $camp) {
        $user = $request->user();
        $user->favoriteCamps()->detach($camp);
        return response()->json(['message' => 'success']);
    }
}
