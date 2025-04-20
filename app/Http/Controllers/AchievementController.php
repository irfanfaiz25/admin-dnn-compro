<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function getAchievements()
    {
        $achievements = Achievement::all();
        if (!$achievements) {
            return response()->json([
                'success' => false,
                'message' => 'Achievement not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Achievement data retrieved successfully',
            'data' => $achievements,
        ], 200);
    }
}
