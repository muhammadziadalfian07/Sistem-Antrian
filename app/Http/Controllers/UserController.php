<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $user = User::orderBy('created_at', 'DESC')->get();
        return view('user.index', compact('user'));
    }

    public function create()
    {
        $role = Role::orderBy('created_at', 'DESC')->get();
        return view('user.create', compact('role'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|string|exists:roles,name'
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => true
        ]);

        $user->assignRole($request->role);
        return redirect(route('users.index'))->with(['success' => 'User : <strong>' . $user->name . '</strong> Ditambahkan']);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'password' => 'nullable|min:6'
        ]);

        try {
            $user = User::findOrFail($id);
            $password = !empty($request->password) ? bcrypt($request->password) : $user->password;
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password
            ]);
            return redirect(route('users.index'))->with(['success' => 'User : <strong>' . $user->name . '</strong> Diperbaharui']);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect(route('users.index'))->with(['success' => 'User : <strong>' . $user->name . '</strong> Dihapus']);
    }


    public function roles($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all()->pluck('name');
        return view('user.roles', compact('user', 'roles'));
    }

    public function aktif($id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'status' => true
        ]);
        return redirect()->back()->with(['success' => 'Status : <strong>' . $user->name . '</strong> Diaktifkan']);
    }

    public function suspend($id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'status' => false
        ]);
        return redirect()->back()->with(['success' => 'Status : <strong>' . $user->name . '</strong> Dinon-aktifkan']);
    }

    public function setRole(Request $request, $id)
    {
        $this->validate($request, [
            'role' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->syncRoles($request->role);
        return redirect()->back()->with(['success' => 'Role Sudah Di Set!']);
    }

    public function addPermission(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:permissions'
        ]);

        $permission = Permission::firstOrCreate([
            'name' => $request->name
        ]);

        return redirect()->back()->with(['success' => 'Hak Akses Di Tambahkan!']);
    }

    public function rolePermission(Request $request)
    {
        $role = $request->get('role');

        $permissions = null;
        $hasPermission = null;

        //mengambil data role
        $roles = Role::all()->pluck('name');

        //apa bila $role terpenuhi
        if (!empty($role)) {
            //select role berdarkan nama
            $getRole = Role::findByName($role);

            //query mengambil permission yang telah di miliki oleh role terkait
            $hasPermission = DB::table('role_has_permissions')
                ->select('permissions.name')
                ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
                ->where('role_id', $getRole->id)->get()->pluck('name')->all();

            //mengambil data permissions
            $permissions = Permission::all()->pluck('name');
        }
        return view('user.role_permission', compact('roles', 'permissions', 'hasPermission'));
    }



    public function SetRolePermission(Request $request, $role)
    {
        //select role berdaskan nama
        $role = Role::findByName($role);

        //fungsi syncPermission akan menghapus semua permissio yg dimiliki role tersebut
        //kemudian di-assign kembali sehingga tidak terjadi duplicate data
        $role->syncPermissions($request->permission);
        return redirect()->back()->with(['success' => 'Permission to Role Saved!']);
    }
}
