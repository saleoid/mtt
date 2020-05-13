<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourtPost;
use App\Events\CourtCreated;

class CourtController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourtPost $request)
    {
        $court = new \App\Court;
        $court->name = $request->name;
        $court->address = $request->address;
        $court->state = $request->state;
        $court->save();
        event(new CourtCreated($court));
        return response()->json($court);
    }
}
