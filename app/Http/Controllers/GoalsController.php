<?php
namespace App\Http\Controllers;

use App\Models\Goals;
use Illuminate\Http\Request;

class GoalsController extends Controller
{
    public function index()
    {
        // Fetch all goals from the database
        $goals = Goals::all();
        return response()->json($goals);
    }

    public function store(Request $request)
    {
        // Validate and store a new goal
        $request->validate([
            'name'     => 'required|string',
            'progress' => 'required|integer',
            'icon'     => 'required|string',
        ]);

        $goal = Goals::create($request->all());

        return response()->json($goal, 201);
    }

    public function update(Request $request, $id)
    {
        // Validate and update an existing goal
        $goal = Goals::findOrFail($id);
        $goal->update($request->all());

        return response()->json($goal);
    }

    public function destroy($id)
    {
        // Delete a goal
        $goal = Goals::findOrFail($id);
        $goal->delete();

        return response()->json(null, 204);
    }
}
