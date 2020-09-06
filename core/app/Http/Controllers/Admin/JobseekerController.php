<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobseekerController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);
        return view('admin.jobseeker.all',compact('users'));
    }

    public function destroy($id)
    {
         $User = User::findOrFail($id);
         $User->delete();
         return back()->with('success','User removed to trash');
    }
 
    public function trashed()
    {
     $users = User::onlyTrashed()->paginate(15);
     return view('admin.jobseeker.trashed',compact('users'));
    }
 
    public function permanentDelete($id)
    {
     $User =  User::onlyTrashed()->find($id);
     $User->forceDelete();
     return back()->with('success','User permanently deleted');
    }
 
    public function restore($id)
    {
     User::onlyTrashed()->find($id)->restore();
     return back()->with('success','Speaker restored successfully');
    }
}
