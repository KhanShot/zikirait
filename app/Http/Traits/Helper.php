<?php

namespace App\Http\Traits;

use Carbon\Carbon;

trait Helper
{
    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d H:i:s');
    }

}
