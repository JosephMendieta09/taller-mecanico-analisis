<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RolePermissionController extends Controller
{
    public function index(Request $request): View   
    {
        $search = $request->input('search');

        $roles = Role::with('permissions')
            ->whereHas('permissions')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
            })
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

        return view('role-permissions.index', compact('roles', 'search'));
    }

    public function create(): View
    {
        $roles = Role::doesntHave('permissions')->get();
        $permissions = Permission::orderBy('name')->get();

        return view('role-permissions.create', compact('roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'required|array'
        ]);

        $role = Role::findOrFail($request->role_id);
        $permissions = Permission::whereIn('id', $request->permissions)->pluck('name')->toArray();

        $role->syncPermissions($permissions);

        return redirect()->route('role-permissions.index')
            ->with('success', "Permisos asignados correctamente a {$role->name}.");
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): View
    {
        $role->load('permissions');
        $permissions = Permission::orderBy('name')->get();
        $assignedPermissionIds  = $role->permissions->pluck('id')->toArray();
 
        return view('role-permissions.edit', compact('role', 'permissions', 'assignedPermissionIds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role) : RedirectResponse
    {
        $request->validate([
            'permissions' => 'required|array'
        ]);

        $permissions = Permission::whereIn('id', $request->permissions)->pluck('name')->toArray();
 
        $role->syncPermissions($permissions);
 
        return redirect()->route('role-permissions.index')
                         ->with('success', "Permisos de {$role->name} actualizados correctamente.");
    }

    public function destroy(Role $role) : RedirectResponse
    {
        $role->syncPermissions([]);

        return redirect()->route('role-permissions.index')
            ->with('success', "Permisos de {$role->name} eliminados correctamente.");
    }
}
