<?php

namespace App\Http\Controllers;

use App\Http\Requests\Listingstoreandupdate;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ListingsController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index', 'show']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(2),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('listings.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Listingstoreandupdate $request)
    {
        $data = $request->validated();
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('listings', 'public');
            $data['logo'] = $path;
        }

        $data['user_id'] = Auth::id();
        Listing::create($data);

        return redirect('/')->with('message', __('main.job_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return view('Listings.edit', ['listing' => $listing]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Listingstoreandupdate $request, Listing $listing)
    {
        if ($listing->user_id != Auth::id()) {
            abort(403, __('main.unauthorized'));
        }
        $data = $request->validated();
        if ($request->hasFile('logo')) {
            if (! empty($listing->logo) && Storage::exists($listing->logo)) {
                Storage::delete($listing->logo);
            }
            $path = $request->file('logo')->store('listings', 'public');
            $data['logo'] = $path;
        } else {
            unset($data['logo']);
        }

        $listing->update($data);

        return redirect('/')->with('message', __('main.job_updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        if ($listing->user_id != Auth::id()) {
            abort(403, __('main.unauthorized'));
        }

        if ($listing->logo && Storage::disk('public')->exists($listing->logo)) {
            Storage::disk('public')->delete($listing->logo);
        }
        $listing->delete();

        return redirect('/')->with('message', __('main.job_deleted'));
    }

    public function manage()
    {
        /** @var User $user */
        $user = Auth::user();

        return view('listings.manage', [
            'listings' => $user->listings()->get(),
        ]);
    }
}
