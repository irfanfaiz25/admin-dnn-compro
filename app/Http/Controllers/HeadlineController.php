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
                'message' => 'Headline not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'headline' => $headline,
        ], 200);
    }
}
