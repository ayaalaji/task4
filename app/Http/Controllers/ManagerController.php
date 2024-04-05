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

    public function storeEmployee(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required,email,unique:employees'],
            'password' => ['required,min:8'],
        ]);

        // $employee = new User();
        //    $employee->name =$request->name;
        //    $employee->email =$request->email;
        //    $employee->password =$request->password;
           

        // $employee->save();
        $employee=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('insert')->with('success', 'Employee saved!');
    }
}
