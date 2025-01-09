<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StatesController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $states = State::all();
        return response()->json(['data' => $states]);
    }
}
