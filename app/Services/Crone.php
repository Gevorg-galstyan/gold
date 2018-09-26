<?php

namespace App\Services;


use App\Models\Guest;
use Carbon\Carbon;

class Crone
{
    public static function deleteGuest(){
        $date = Carbon::now()->addDays(-5);
        $guests = Guest::whereDate('created_at', '<=', $date)->delete();
        return $guests;
    }
}
