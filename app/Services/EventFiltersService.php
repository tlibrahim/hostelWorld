<?php

namespace App\Services;

use File;
use Illuminate\Support\Facades\Log;

class EventFiltersService implements EventServiceInterface
{
    public function getCountryEvent($filters){

        $json = json_decode(File::get(public_path("data/data.json")));

        $data = collect($json)
        ->when($filters->date, function ($q) use( $filters){
            return $q->where('startDate', '>=', $filters->date);
        })

        ->when($filters->country, function ($q) use( $filters){
            return $q->where('country', '%like%', $filters->country);
        })

        ->when($filters->city, function ($q) use( $filters){
            return $q->where('city','%like%',$filters->city);
        });
        
        Log::debug($data);
        
        return $data;
    }
}