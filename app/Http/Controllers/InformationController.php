<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function getInformation($name)
    {
        $information = Information::where('name', $name)->first();
        if (!$information) {
            return response()->json([
                'success' => false,
                'message' => 'Information not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Information data retrieved successfully',
            'data' => $information,
        ], 200);
    }
}
