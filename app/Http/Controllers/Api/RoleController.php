<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
class RoleController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only'=>['index','store']]);
        $this->middleware('permission:rol-create',['only'=>['create','store']]);
        $this->middleware('permission:rol-edit',['only'=>['edit','update']]);
        $this->middleware('permission:rol-delete',['only'=>['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id','DESC')->paginate(5);
        if(!$roles){
            return response()->json(['message' => 'Error al traer los roles !'],401);
        }else {
            return response()->json(['roles'=>$roles,'message' => 'Información de roles!'],201);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        if(!$permission){
            return response()->json(['message' => 'Error al traer los permisos !'],401);
        }else {
            return response()->json(['permission'=>$permission,'message' => 'Información de permisos!'],201);
        }

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
            'name'=> 'required|unique:roles,name',
            'permission'=>'required'
        ]);

        $role = Role::create(['name'=>$request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return response()->json(['rol'=>$role, 'message' => 'Rol Creado!'],201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role= Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permission.id")
        ->where("role_has_permissions.role_id",$id)->get();
        return response()->json(['rol'=>$role,'permisos'=> $rolePermissions, 'message' => 'Rol Lista!'],201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role= Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")
        ->where("role_has_permissions.role_id",$id)
        ->pluck("role_has-permissions.permissions_id","role_has_permissions.permission_id")
        ->all();
        return response()->json(['rol'=>$role,'permisos'=> $rolePermissions, 'message' => 'Rol Lista!'],201);
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
            'name'=>'required',
            'permission'=> 'required'
        ]);


        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));
        return response()->json(['rol'=>$role, 'message' => 'Rol Lista!'],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return response()->json([ 'message' => 'Rol Eliminado!'],201);
    }
}
