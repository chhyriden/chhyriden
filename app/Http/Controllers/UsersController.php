<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Hash;
use Session;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(20);
        return view('manage.users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        if ($request->has('password') && !empty($request->password)) {
            $this->validate($request, [
                'password' => 'required|string|max:150|min:6|alpha_num',
            ]);
            // Set Password Manually
            $password = trim($request->password);
        } else {
            // Auto Set Password
            $length = 15;
            $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVQXYZ';
            $str= '';
            $max = mb_strlen($keyspace, '8bit') - 1;
            for($i = 0; $i < $length; $i++) {
                $str .= $keyspace[random_int(0, $max)];
            }
            $password = $str;
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($password);

        if ($user->save()) {
            return redirect()->route('users.show', $user->id);
        } else {
            Session::flash('danger', 'Sorry a problem occurred while creating this user.');
            return redirect()->route('users.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('roles')->findOrFail($id);
        return view('manage.users.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::with('roles')->findOrFail($id);
        return view('manage.users.edit')->withUser($user)->withRoles($roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$id,
            
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password_options == 'auto') {
            $length = 15;
            $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVQXYZ';
            $str= '';
            $max = mb_strlen($keyspace, '8bit') - 1;
            for($i = 0; $i < $length; $i++) {
                $str .= $keyspace[random_int(0, $max)];
            }
            $password = $str;
            $user->password = Hash::make($password);

        } elseif ($request->password_options == 'manual') {
            $this->validate($request, [
                'password' => 'required|string|max:150|min:6|alpha_num',
            ]);
            $password = trim($request->password);
            $user->password = Hash::make($password);
        }

        if ($user->save()) {
            
            $user->syncRoles(explode(',', $request->roles));

            Session::flash('success', 'User profile has been updated.');
            return redirect()->route('users.show', $user->id);
        } else {
            Session::flash('danger', 'Sorry a problem occurred while updating this user.');
            return redirect()->route('users.edit', $user->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        
    }
}
