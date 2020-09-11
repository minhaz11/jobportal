<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Profile;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    public function index()
    {
        return view('jobseeker.profile');
    }

    public function profileUpdate(ProfileRequest $request, $id)
    {
        $request->validated();
        $user                        = User::findOrFail($id);
        $user->name                  = $request->name;
        $user->profile->user_id      = Auth::user()->id;
        $user->profile->address      = $request->address;
        $user->profile->gender       = $request->gender;
        $user->profile->dob          = $request->dob;
        $user->profile->experience   = $request->experience;
        $user->profile->bio          = $request->bio;
        $user->profile->cover_letter = $request->cv;
        $user->profile->resume       = $request->resume;
        $user->profile->save();
        $user->save();
        return back()->with('success', 'User profile updated successfully');
    }

    public function updateProfileImage(Request $request)
    {
        $request->validate([
            "avatar" => "bail|image|max:3096",
        ], [
            "avatar.max" => "Maximum file size to upload is 3MB (3096 KB). If you are uploading a photo, try to reduce its resolution to make it under 3MB",
        ]);

        $user = Profile::whereUserId(Auth::id())->first();
        if ($request->hasFile('avatar')) {
            $image       = $request->file('avatar');
            $slug        = Str::slug(Auth::user()->username);
            $currentDate = Carbon::now()->toDateString();
            $imagename   = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists('assets/uploads/profile')) {
                mkdir('assets/uploads/profile', 0777, true);
            }
            if (file_exists('assets/uploads/profile/' . $user->avatar)) {
                unlink('assets/uploads/profile/' . $user->avatar);
            }
            Image::make($image)->resize(300, 300)->save('assets/uploads/profile/' . $imagename);

        } else {
            $imagename = $user->avatar;
        }
        $user->avatar = $imagename;
        $user->save();
        return back()->with('success', 'User image successfully updated');
    }
}
