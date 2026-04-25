<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View   
    {
        $search = $request->input('search');

        $users = User::with('roles')
            ->whereHas('roles') // 🔥 solo usuarios con roles
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

        return view('user-roles.index', compact('users', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $users = User::doesntHave('roles')->get();
        $roles = Role::orderBy('name')->get();

        return view('user-roles.create', compact('users', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'roles' => 'required|array'
        ]);

        $user = User::findOrFail($request->user_id);
        $roles = Role::whereIn('id', $request->roles)->pluck('name')->toArray();

        $user->syncRoles($roles);

        return redirect()->route('user-roles.index')
            ->with('success', "Roles asignados correctamente a {$user->name}.");
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        $user->load('roles');
        $roles = Role::orderBy('name')->get();
        $assignedRoleIds  = $user->roles->pluck('id')->toArray();
 
        return view('user-roles.edit', compact('user', 'roles', 'assignedRoleIds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user) : RedirectResponse
    {
        $request->validate([
            'roles' => 'required|array'
        ]);

        $roles = Role::whereIn('id', $request->roles)->pluck('name')->toArray();
 
        $user->syncRoles($roles);
 
        return redirect()->route('user-roles.index')
                         ->with('success', "Roles de {$user->name} actualizados correctamente.");
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->syncRoles([]);

        return redirect()->route('user-roles.index')
            ->with('success', "Roles de {$user->name} eliminados correctamente.");
    }
}
