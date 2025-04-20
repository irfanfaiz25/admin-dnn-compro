<?php

namespace App\Http\Controllers;

use App\Models\Headline;
use Illuminate\Http\Request;

class HeadlineController extends Controller
{
    public function getHeadline($sectionName)
    {
        $headline = Headline::where('section_name', $sectionName)->first();
        if (!$headline) {
            return response()->json([
                'success' => false,
                'message' => 'Headline not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Headline data retrieved successfully',
            'data' => $headline,
        ], 200);
    }
}
