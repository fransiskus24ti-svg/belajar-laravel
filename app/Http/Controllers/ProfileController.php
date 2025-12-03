<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the user's profile.
     */
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    /**
     * Show the edit profile form.
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the user's profile picture.
     */
    public function update(Request $request)
    {
        // 1. Validate the incoming request data
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB file size
        ]);

        // Get the currently authenticated user
        $user = Auth::user();

        // 2. Delete the old profile picture if it exists
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        // 3. Store the new profile picture
        // Stores the file under 'storage/app/public/profile_pictures'
        $path = $request->file('profile_picture')->store('profile_pictures', 'public');

        // 4. Update the user's record in the database
        $user->profile_picture = $path;
        $user->save();

        // 5. Redirect back with a success message
        return redirect()->route('profile.edit')->with('success', 'Profile picture updated successfully!');
    }

    /**
     * Delete the user's profile picture.
     */
    public function destroy()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // 1. Delete the file from storage if it exists
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        // 2. Clear the profile picture column in the database
        $user->profile_picture = null;
        $user->save();

        // 3. Redirect back with a success message
        return redirect()->route('profile.edit')->with('success', 'Profile picture deleted successfully!');
    }
}
