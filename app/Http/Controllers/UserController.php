<?php

namespace Modules\User\app\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller; // reeplace with "App\Http\Controllers\Controller" (if available)
use Modules\User\app\Http\Requests\StoreUserRequest;
use Modules\User\app\Http\Requests\UpdateUserRequest;
use Modules\User\app\Models\User;

class UserController extends Controller
{
    public $data = [];

    public function __construct()
    {
        // $this->middleware(['permission:users.list'])->only('index');
        // $this->middleware(['permission:users.show'])->only('show');
        // $this->middleware(['permission:users.create'])->only('create', 'store');
        // $this->middleware(['permission:users.edit'])->only('edit', 'update');
        // $this->middleware(['permission:users.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $this->data['head']['title'] = 'Users Management';

        $this->data['users'] = User::all();

        return response(view('user::index', $this->data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $this->data['head']['title'] = 'Create User';

        return response(view('user::create', $this->data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        // ... store the user record

        session()->flash('status', 'User created successfully.');
        return redirect(route('user.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): Response
    {
        $this->data['head']['title'] = $user->name;

        $this->data['user'] = $user;

        return response(view('user::show', $this->data));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): Response
    {
        $this->data['head']['title'] = "Edit: {$user->name}";

        $this->data['user'] = $user;

        return response(view('user::edit', $this->data));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        // ... update user record

        session()->flash('status', 'User updated successfully.');
        return redirect(route('user.index'));
    }

    /**
     * Trash the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        // relationships

        // Trash User account
        $user->delete();

        session()->flash('status', 'User trashed successfully.');
        return redirect(route('user.index'));
    }

    /**
     * Restore the specified resource to storage.
     */
    public function restore($user): RedirectResponse
    {
        // Get user
        $user = User::withTrashed()->find($user);

        // relationships

        $user->restore();

        session()->flash('status', 'User restored successfully.');
        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage permanently.
     */
    public function permanent($user): RedirectResponse
    {
        $user = User::withTrashed()->find($user);

        // relationships

        // User account
        $user->forceDelete();

        session()->flash('status', 'User deleted permanently.');
        return redirect(route('user.index'));
    }
}
