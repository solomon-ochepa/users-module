<?php

namespace Modules\User\app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\User\app\Http\Requests\StoreUserRequest;
use Modules\User\app\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public $data = [];

    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware(['permission:users.index'])->only('index');
        // $this->middleware(['permission:users.show'])->only('show');
        // $this->middleware(['permission:users.create'])->only('create', 'store');
        // $this->middleware(['permission:users.edit'])->only('edit', 'update');
        // $this->middleware(['permission:users.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['head']['title'] = 'Users Management';

        $this->data['users'] = User::all();

        return response(view('user::index', $this->data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['head']['title'] = 'Create User';

        return response(view('user::create', $this->data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        //

        session()->flash('status', 'Resource created successfully.');

        return redirect(route('user.index'));
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);

        $this->data['head']['title'] = $user->name;

        $this->data['user'] = $user;

        return response(view('user::show', $this->data));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);

        $this->data['head']['title'] = "Edit: {$user->name}";

        $this->data['user'] = $user;

        return response(view('user::edit', $this->data));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, $id): RedirectResponse
    {
        $user = User::find($id);

        //

        session()->flash('status', 'Resource updated successfully.');

        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $user = User::find($id);

        // relationships

        // Trash User account
        $user->delete();

        session()->flash('status', 'Resource deleted successfully.');

        return redirect(route('user.index'));
    }

    /**
     * Restore the specified resource to storage.
     */
    public function restore($id): RedirectResponse
    {
        // Get user
        $user = User::withTrashed()->find($id);

        // relationships

        $user->restore();

        session()->flash('status', 'Resource restored successfully.');

        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage permanently.
     */
    public function permanent($id): RedirectResponse
    {
        $user = User::withTrashed()->find($id);

        // relationships

        // User account
        $user->forceDelete();

        session()->flash('status', 'Resource deleted permanently.');

        return redirect(route('user.index'));
    }
}
