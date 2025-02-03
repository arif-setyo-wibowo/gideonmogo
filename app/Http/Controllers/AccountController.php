<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('my-account');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Update account details.
     */
    public function updateAccountDetails(Request $request)
    {
        $user = Auth::user();

        try {
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'nullable|string|max:255',
                'display_name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
            ]);

            // Update user details
            $user->update([
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'] ?? null,
                'display_name' => $validatedData['display_name'],
                'email' => $validatedData['email'],
            ]);

            return redirect()->route('my-account.index')
                ->with('success_message', 'Account details updated successfully!')
                ->with('alert_type', 'success');
        } catch (\Exception $e) {
            return redirect()->route('my-account.index')
                ->with('error_message', 'Failed to update account details. Please try again.')
                ->with('alert_type', 'error');
        }
    }

    /**
     * Change password.
     */
    public function changePassword(Request $request)
    {
        $user = Auth::user();

        try {
            $validatedData = $request->validate([
                'current_password' => 'required',
                'new_password' => 'required|min:8|confirmed',
            ], [
                'current_password.required' => 'Please enter your current password.',
                'new_password.required' => 'Please enter a new password.',
                'new_password.min' => 'New password must be at least 8 characters long.',
                'new_password.confirmed' => 'New password confirmation does not match.',
            ]);

            // Check if current password is correct
            if (!Hash::check($validatedData['current_password'], $user->password)) {
                if ($request->ajax()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Current password is incorrect.'
                    ], 400);
                }

                return redirect()->route('my-account.index')
                    ->with('error_message', 'Current password is incorrect.')
                    ->with('alert_type', 'error');
            }

            // Update password
            $user->update([
                'password' => Hash::make($validatedData['new_password']),
            ]);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Password changed successfully!'
                ]);
            }

            return redirect()->route('my-account.index')
                ->with('success_message', 'Password changed successfully!')
                ->with('alert_type', 'success');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to change password. Please try again.'
                ], 500);
            }

            return redirect()->route('my-account.index')
                ->with('error_message', 'Failed to change password. Please try again.')
                ->with('alert_type', 'error');
        }
    }
}
