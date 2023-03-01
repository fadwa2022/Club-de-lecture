<?php

namespace App\Http\Controllers;

use App\Models\groupes;
use App\Models\favorites;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function edit(Request $request): View
    {
        $favorites= favorites::join('books', 'favorites.books_id', '=', 'books.id')
        ->select('favorites.*', 'books.title','books.image','books.discription','books.auteur','books.id as id_book')
        ->get()->filter(function ($entry) {
            return $entry->user_id === auth()->id();
        });
        $groupes = groupes::join('books', 'groupes.books_id', '=', 'books.id')
        ->select('groupes.*', 'books.title','books.image','books.discription','books.auteur','books.id as id_book')
        ->get()
        ->filter(function ($entry) {
                return $entry->user_created === auth()->id();
            });

        return view('profile.edit', [
            'user' => $request->user(),
            'favorites'=>$favorites,
            'groupes'=>$groupes
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
