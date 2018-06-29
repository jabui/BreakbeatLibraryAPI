<?php

namespace App\Http\Controllers;

use App\Models\Artist;

class ArtistController extends Controller
{

    /**
     * @return Artist[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Artist::all();
    }
}
