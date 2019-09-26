<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Gradebook;
use App\UserImage;

class UsersController extends Controller
{
    public function index()
    {
        return User::with(['gradebook', 'images'])->get();
    }

    public function store(Request $request)
    {
        $this->validate(request(), User::STORE_RULES);
        \Log::info($request->input('image'));
        $user = new User();
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user = $request->input('email', 'placeholder.email@gmail.com');
        $user->password = null;

        $gradebook = Gradebook::find($request->input('gradebook_id'));
        $gradebook->user_id = $user->id;

        $userImage = new UserImage();
        $userImage->user_id = $professor->id;
        $userImage->image = $request->input('image');
        $userImage->save();
    
        $user->save();
        
        return $user;

    }

    public function show($id)
    {
        return User::with(['gradebook.students', 'images', 'gradebook'])->find($id);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());

        return $user;
    }

    public function destroy($id)
    {
        User::destroy($id);
        return response()->json('User is deleted!');
    }
}
