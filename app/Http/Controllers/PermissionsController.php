<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use Session;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::orderBy('id', 'DESC')->paginate(20);
        return view('manage.permissions.index')->withPermissions($permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexcreate()
    {
        return view('manage.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->permission_type == 'basic') {
            $this->validate($request, [
                'display_name'  => 'required|min:6|max:20',
                'name'          => 'required|min:6|max:20|alpha_dash|unique:permissions,name',
                'description'   =>  'sometimes|max:50'
            ]);

            $permission = new Permission();
            $permission->display_name = ucwords($request->display_name);
            $permission->name = str_replace(' ', '-', strtolower($request->name));
            $permission->description = ucwords($request->description);

            $permission->save();
            Session::flash('success', $permission->display_name.' has been added as a new permission.');
            return redirect()->route('permissions.index');

        } elseif ($request->permission_type == 'crud') {
            $this->validate($request, [
                'resource'  => 'required|min:3|max:20'
            ]);
            $cruds = explode(',', $request->crud_selected);
            if (count($cruds) > 0) {
                foreach($cruds as $crud) {
                    $permission = new Permission();
                    $permission->display_name = ucwords($crud).' '.ucwords($request->resource);
                    $permission->name = strtolower($crud).'-'.str_replace(' ', '-', strtolower($request->resource));
                    $permission->description = "Allow user to ".ucwords($crud).' '.ucwords($request->resource);
                    $permission->save();
                }

                Session::flash('success', $permission->display_name.' '. 'has been added as a new permission.');
                return redirect()->route('permissions.index');
            }
        } else {
            return redirect()->route('permission.create')->withInput();
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
        $permission = Permission::findOrFail($id);

        return view('manage.permissions.show')->withPermission($permission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view('manage.permissions.edit')->withPermission($permission);
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
            'display_name'  =>  'required|min:3|max:20',
            'description'   =>  'sometimes|min:3|max:50',
        ]);

        $permission = Permission::findOrFail($id);
        $permission->display_name  = $request->display_name;
        $permission->description  = $request->description;
        
        if ($permission->save()) {
            Session::flash('success', $permission->display_name .' has been updated successfully.');
            return redirect()->route('permissions.show', $permission->id);

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
        //
    }
}
