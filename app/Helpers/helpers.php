<?php

namespace App\Helpers;

use App\Models\Desk;

    function getDeskOpen(){

        $now = now()->format('Y/m/d');
        $desk = Desk::where('date',$now)->first();

        if(empty($desk) || $desk->status == 'closed'){
            return null;
        }
        return $desk->id;
    }