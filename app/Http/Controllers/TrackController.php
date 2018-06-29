<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Validators\Tracks\CreateValidator;

class TrackController extends Controller
{
    /**
     * @return Track[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Track::all();
    }

    /**
     * Store a new track
     *
     * @param  Request $request
     * @return JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $validator = new CreateValidator();
        $validator->validate($request);

        $track = new Track();
        $track->fill($request->all());

        return response()->json($track, 201);
    }
}
