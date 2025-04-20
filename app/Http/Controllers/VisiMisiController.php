<?php

namespace App\Http\Controllers;

use App\Models\Misi;
use App\Models\Visi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function getVisiMisi($name)
    {
        if ($name == 'visi') {
            $data = Visi::first();
            if (!$data) {
                return response()->json([
                    'success' => false,
                    'message' => 'Visi not found',
                ], 404);
            }
        } else {
            $data = Misi::orderBy('order_number', 'asc')->get();
            if (!$data) {
                return response()->json([
                    'success' => false,
                    'message' => 'Misi not found',
                ], 404);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Data retrieved successfully',
            'data' => $data,
        ], 200);
    }
}
