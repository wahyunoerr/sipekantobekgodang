<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', User::class);

        $query = User::query();

        if ($request->has('q') && $request->q !== null) {
            $query->where('name', 'like', '%' . $request->q . '%');
        }
        $users = $query->with('roles')->latest()->paginate(10);
        return Inertia::render('Users/Index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        $this->authorize('create', User::class);

        $roles = Role::all();
        return Inertia::render('Users/Create', [
            'roles' => $roles
        ]);
    }

    public function store(UserRequest $request)
    {
        $this->authorize('create', User::class);

        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $user->assignRole($request->role);

        return redirect()->route('users.index');
    }

    public function edit($uuid)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();
        $roles = Role::all();
        return Inertia::render('Users/Edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function update(UserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $data = $request->validated();
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $user->update($data);
        $user->syncRoles($request->role);

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();
        return redirect()->route('users.index');
    }

    public function editByUuid($uuid)
    {
        return $this->edit($uuid);
    }

    public function updateByUuid(UserRequest $request, $uuid)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();
        return $this->update($request, $user);
    }

    public function destroyByUuid($uuid)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();
        return $this->destroy($user);
    }

    public function show($uuid)
    {
        $user = User::where('uuid', $uuid)->with('roles')->firstOrFail();
        $this->authorize('view', $user);

        return Inertia::render('Users/Show', [
            'user' => $user
        ]);
    }
}
