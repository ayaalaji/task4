<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function dashboard(){
        return view('manager.dashboard');
    }

     public function createEmployee()
    {
        return view('insert');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','max:255','string'],
            'email' => ['required','max:255','string','email','unique:users,email'],
            'password' => ['required','max:255','string','min:8'],
            'confirm_password' => ['required','max:255','string','min:8'],
        ]);

        $employee = new User();
        $employee->name =$request->name;
        $employee->email =$request->email;
        $employee->password =Hash::make($request->password);

        $employee->save();

        return redirect()->route('insertEmployee')->with('success', 'Employee saved!');
    }
}
