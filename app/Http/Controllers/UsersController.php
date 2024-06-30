<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        return view("users",compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        // Check if the authenticated user is authorized to update roles
        if (auth()->user()->role !== 'super admin' || $user->id === auth()->id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        // Validate the role change request
        $request->validate([
            'role' => 'required|in:client,admin',
        ]);

        // Update the user's role
        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('success', 'User role updated successfully.');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Check if the authenticated user is authorized to delete users
        if (auth()->user()->role !== 'super admin' || $user->id === auth()->id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        // Perform the deletion
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
