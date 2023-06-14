<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Goal;
use App\Models\GoalTask;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Goal::with('task')->where('user_id', Auth::user()->id)->get();


        return response()->json([
            'status' => true,
            'message' => 'Successfully',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateUser = Validator::make($request->all(), 
        [
            'title' => 'required',
            'type' => 'required',
        ]);

        if($validateUser->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateUser->errors()
            ], 401);
        }

        $data = Goal::create([
            'title' => $request->title,
            'type' => $request->type,
            'user_id' => Auth::user()->id,
        ]);


        return response()->json([
            'status' => true,
            'message' => 'Successfully',
            'data' => $data
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateUser = Validator::make($request->all(), 
        [
            'title' => 'required',
            'type' => 'required',
        ]);

        if($validateUser->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateUser->errors()
            ], 401);
        }


        $data = Goal::where('id', $id)
                    ->where('user_id', Auth::user()->id)
                    ->first();


        if (!isset($data)) {
            return response()->json([
                'status' => false,
                'message' => 'data not found',
            ], 404);
        }
        
        Goal::find($id)->update([
            'title' => $request->title,
            'type' => $request->type,
        ]);

        $data = Goal::find($id);


        return response()->json([
            'status' => true,
            'message' => 'Successfully',
            'data' => $data
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Goal::where('id', $id)
                    ->where('user_id', Auth::user()->id)
                    ->first();


        if (!isset($data)) {
            return response()->json([
                'status' => false,
                'message' => 'data not found',
            ], 404);
        }
        
        Goal::find($id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Successfully',
        ], 200);
    }
}
