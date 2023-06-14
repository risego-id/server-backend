<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Goal;
use App\Models\GoalTask;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = GoalTask::with('goal')->where('user_id', Auth::user()->id)->get();


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
            'goal_id' => 'required',
            'title' => 'required',
            'is_done' => 'required',
            'task_type' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        if($validateUser->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateUser->errors()
            ], 401);
        }

        $data = Goal::where('id', $request->goal_id)
                    ->where('user_id', Auth::user()->id)
                    ->first();


        if (!isset($data)) {
            return response()->json([
                'status' => false,
                'message' => 'goal not found',
            ], 404);
        }

        $data = GoalTask::create([
            'goal_id' => $request->goal_id,
            'title' => $request->title,
            'is_done' => $request->is_done,
            'task_type' => $request->task_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
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
            'is_done' => 'required',
            'task_type' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        if($validateUser->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateUser->errors()
            ], 401);
        }
        
        GoalTask::find($id)->update([
            'title' => $request->title,
            'is_done' => $request->is_done,
            'task_type' => $request->task_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        $data = GoalTask::find($id);


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
        $data = GoalTask::find($id);


        if (!isset($data)) {
            return response()->json([
                'status' => false,
                'message' => 'data not found',
            ], 404);
        }
        
        $data->delete();

        return response()->json([
            'status' => true,
            'message' => 'Successfully',
        ], 200);
    }
}
