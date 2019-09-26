<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gradebook;
use App\User;

class GradebooksController extends Controller
{
    public function index()
    {
        return Gradebook::with(['user', 'students'])->get();
    }

    public function store(Request $request)
    {
        $this->validate(request(), Gradebook::STORE_RULES);

        $gradebook = new Gradebook();
        $gradebook->name = $request->input('name');
        $gradebook->user_id = $request->input('user_id');
        $gradebook->save();

        return $gradebook;
    }

    public function show($id)
    {
        $gradebook = Gradebook::with(['user', 'students', 'comments.user'])->findOrFail($id);
        return $gradebook;
    }

    public function update(Request $request, $id)
    {
        $gradebook = Gradebook::find($id);
        $gradebook->update($request->all());

        return $gradebook;
    }

    public function destroy($id)
    {
        // Gradebook::destroy($id);
        Gradebook::find($id)->delete();
        return response()->json('Gradebook is deleted!');
    }
}
