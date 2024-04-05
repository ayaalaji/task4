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


    public function edit($id){
        $employee = User::find($id); 
        return view('edit-employee', ['employee' => $employee]);
    }

    public function update(Request $request,$id){
        
    $employee = User::find($id);
    $employee->name = $request->input('name');
    
    $employee->save();

    return redirect('/showEmployee');
    }

    public function destroy(Request $request,$id){
        User::destroy($id);
        return redirect()->route('showEmployee');
    }

    // public function addation(){
    //     return view('insert');
    // }
    // public function store(Request $request){
    //     $request->validate([
    //         'name'  =>['string'],
    //         'email' =>['email'],
    //         'password' =>[]
    //     ]);

    //     $user = new User();

    //     $user->name =$request->name;
    //     $user->email =$request->email;
    //     $user->password =$request->password;

    //     $user->save;

    //     return redirect()->route('showEmployee');

    // }
}
