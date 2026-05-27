<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
        public function create()
    {
            $companies = Company::all();

        $roles = Role::all();

            return view('users.create', compact('companies', 'roles'));
    }

      public function store(Request $request)
    {
            $loggedInUser = auth()->user();

        if (
                $loggedInUser->role->name === 'SuperAdmin'
                    &&
                $request->role_id == 2
        ) {

                return back()->with(
                    'error',
                    'SuperAdmin cannot invite Admin.'
                );
        }

        if (
                $loggedInUser->role->name === 'Admin'
                    &&
                in_array($request->role_id, [2,3])
        ) {

                return back()->with(
                    'error',
                    'Admin cannot invite Aadmin or member.'
                );
        }

            User::create([

                    'company_id' => $request->company_id,

                'role_id' => $request->role_id,

                    'name' => $request->name,

                'email' => $request->email,

                    'password' => Hash::make($request->password),

        ]);

            return redirect()
                    ->route('dashboard')
                        ->with(
                            'success',
                            'User created successfully.'
                        );
    }
}