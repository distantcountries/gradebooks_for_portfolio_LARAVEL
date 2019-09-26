<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserImage;

class UsersImagesController extends Controller
{
    public function index()
    {
        return UserImage::with('user')->get();
    }

    public function store(Request $request)
    {
        // $this->validate(request(), User::STORE_RULES);

        return UserImage::create($request->all());
    }

    public function show($id)
    {
        return UserImage::with('user')->find($id);
    }

    public function update(Request $request, $id)
    {
        $userImage = UserImage::find($id);
        $userImage->update($request->all());

        return $userImage;
    }

    public function destroy($id)
    {
        UserImage::destroy($id);
        return response()->json('User image is deleted!');
    }
}
