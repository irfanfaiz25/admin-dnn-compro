<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function getSection($sectionName)
    {
        $sections = Section::where('section_name', $sectionName)->get();
        if (!$sections) {
            return response()->json([
                'success' => false,
                'message' => 'Section not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Section data retrieved successfully',
            'data' => $sections,
        ], 200);
    }
}
