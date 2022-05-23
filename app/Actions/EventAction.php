<?php

namespace App\Actions;

use App\Services\EventFiltersService;
use Illuminate\Http\Request;
use File;

class EventAction
{
    public function __construct(EventFiltersService $eventService){

        $this->eventService = $eventService;
    }


    public function index(Request $request){
        
       return $this->eventService->getCountryEvent($request);
    }
}