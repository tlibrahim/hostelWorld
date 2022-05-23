<?php

namespace App\Http\Controllers\API;

use App\Actions\EventAction;
use App\Http\Requests\EventRequest;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function __invoke(EventRequest $request, EventAction $eventAction){

        return $eventAction->index($request);
    }
}
