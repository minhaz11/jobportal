<?php

namespace App\Http\Controllers\Admin;

use App\Employer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
   public function index()
   {
       $employers = Employer::latest()->paginate(15);
       return view('admin.employer.allEmployer',compact('employers'));
   }

   public function destroy($id)
   {
        $Employer = Employer::findOrFail($id);
        $Employer->delete();
        return back()->with('success','Employer removed to trash');
   }

   public function trashed()
   {
    $employers = Employer::onlyTrashed()->paginate(15);
    return view('admin.employer.trashed',compact('employers'));
   }

   public function permanentDelete($id)
   {
    $Employer =  Employer::onlyTrashed()->find($id);
    $Employer->forceDelete();
    return back()->with('success','Employer permanently deleted');
   }

   public function restore($id)
   {
    Employer::onlyTrashed()->find($id)->restore();
    return back()->with('success','Employer restored successfully');
   }
}
