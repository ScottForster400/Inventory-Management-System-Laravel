<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminUpdateRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request, User $user = null): View
    {

        //gets the selected user that was passed when choosing user details
        $user = $user ?: $request->user();

        return view('profile.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request, User $user): RedirectResponse
    {

        //updates the users information
        $user->fill($request->validated());
        $user->admin = $request->has('admin') ? 1 : 0;
        $user->save();

        return Redirect::route('profile.edit', $user)->with('status', 'profile-updated');
    }

    //updates the correct users password
    public function updatePassword(Request $request, User $user): RedirectResponse
    {
        //confirms with current password
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'That is not this users current password.']);
        }

        //if the current password is confirmed then the password is updated to be a new password.
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('profile.edit', $user)->with('status', 'password-updated');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request, User $user): RedirectResponse
    {
        //deletes the user.
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')->with('status', 'account-deleted');
    }
}
