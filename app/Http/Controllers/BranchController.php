<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function getBranches()
    {
        $branches = Branch::orderBy('established', 'desc')->get();
        if (!$branches) {
            return response()->json([
                'success' => false,
                'message' => 'Branch not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Branches data retrieved successfully',
            'data' => $branches,
        ]);
    }
}
