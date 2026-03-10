<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * List all actors
     */
    public function listActors()
    {
        $actors = Actor::all();
        return view('actors.list', compact('actors'));
    }
}
