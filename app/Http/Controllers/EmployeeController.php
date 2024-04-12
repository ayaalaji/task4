<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EmployeeController extends Controller
    {  

    public function show(Request $request){

        $employee = User::where('id','>',2)->get();

        return view('show-all-emp',compact('employee'));
    }

    public function showEmployee(Request $request){
        $employees = User::where('id','>',1)->get();

        return view('employee-table',compact('employees'));
    }


    public function edit(User $user){
        return view('edit-employee', compact('user'));
    }

    public function update(Request $request,User $user){
        
    $user->name = $request->input('name');
    
    $user->save();

    return redirect('/showEmployee');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('showEmployee');
    }

    
}
