<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;


class RecommendationController extends Controller
{
     /**
     * Create User
     * @param Request $request
     * @return User 
     */
    public function foodRecommendation(Request $request)
    {
        try {
            
            $user = Auth::user();

            if ($user->weight == null || $user->height == null || $user->gender == null || $user->date_of_birth == null) {
                return response()->json([
                    'status' => false,
                    'message' => "Please update your weight, height, gender, and birt of date first for generate the recommendation"
                ], 403);
            }

            $response = Http::post('http://34.101.53.77/food_recommendations', [
                "Weight" => (int)$user->weight,
                "Height" => (int)$user->height,
                "Gender" => $user->gender,
                "Age" => $user->age
            ]);


            return response()->json([
                'status' => true,
                'message' => 'Request Successfully',
                'data' => $response->json()
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
