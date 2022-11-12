<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampRequest;
use App\Models\Camp;
use Illuminate\Http\Request;

class NewCampController extends Controller {
    public function create(CampRequest $request) {
        /** @var Camp $camp */
        $camp = $request->user()->camps()->create($request->all());
        $camp->offers()->createMany($request->input('offers'));
        return $camp;
    }

    public function index() {
        return auth()->user()->camps;
    }

    public function approveStatus(Camp $camp) {
        return response()->json([
            'status' => $camp->status
        ]);
    }
}
