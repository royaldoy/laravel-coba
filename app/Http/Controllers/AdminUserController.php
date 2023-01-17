<?php

namespace App\Http\Controllers;

use App\Models\User;
// use App\Models\Audit;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // return Audit::all();
        return view('dashboard.users.index', [
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return "aa";
        return view('dashboard.users.create', [
            'users' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users',
            'name' =>  'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:5',
            'is_admin' => 'required'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        // return $validatedData;
        User::create($validatedData);

        return redirect('/dashboard/users')->with('success', 'User has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    public function archive()
    {
        return view('dashboard.users.archive', [
            'users' => User::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // return $user;
        return view('dashboard.users.edit', [
            'users' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' =>  'required',
            'is_admin' => 'required'
        ];

        if ($request->email != $user->email) {
            $rules['email'] = 'required|email|unique:users';
        } else {
            $rules['email'] = 'required';
        }

        if ($request->username != $user->username) {
            $rules['username'] = 'required|unique:users';
        } else {
            $rules['username'] = 'required';
        }

        if ($request->password != null) {
            $rules['password'] = 'required|min:5';
        }

        $validatedData = $request->validate($rules);

        if ($request->password != null) {
            $validatedData['password'] = bcrypt($request->password);
        }


        $data =  User::find($user->id);
        $data->update($validatedData);


        // User::where('id', $user->id)->update($validatedData);
        return redirect('/dashboard/users')->with('success', 'User has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function lost(User $user)
    {
        if ($user->trashed()) {
            $user->forceDelete();
            return redirect('/dashboard/users/archive')->with('success', 'user has been deleted');
        }
    }
    public function destroy(User $user)
    {

        User::destroy($user->id);
        return redirect('/dashboard/users')->with('success', 'user has been deleted');
    }

    public function restore(User $user, Request $request)
    {
        // return $user;
        $user->restore();

        return redirect('/dashboard/users')->with('success', 'user has been restored');
    }
}
