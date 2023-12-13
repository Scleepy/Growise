<?php

namespace App\Http\Controllers;

use App\Models\ShipmentStatus;
use Illuminate\Http\Request;

class ShipmentStatusController extends Controller
{
    public function create()
    {
        $fields = [
            'ShipmentDate' => now(),
            'StatusID' => 1,
        ];

        $ss = ShipmentStatus::create($fields);

        return $ss;
    }
}
