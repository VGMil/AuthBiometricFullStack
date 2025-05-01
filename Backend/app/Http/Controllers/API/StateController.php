<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\stateEvent;

class StateController extends Controller
{
    public function actualizar(Request $request)
    {
        $state = $request->string('state');

        broadcast(new stateEvent($state))->toOthers();

        return response()->json(['estado' => $state]);
    }
}
