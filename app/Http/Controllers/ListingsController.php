<?php

namespace App\Http\Controllers;

use App\Contracts\ListingServiceInterface;
use App\Http\Requests\Listingstoreandupdate;
use App\Models\Listing;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class ListingsController extends Controller implements HasMiddleware
{
    protected ListingServiceInterface $listingService;

    public function __construct(ListingServiceInterface $listingService)
    {
        $this->listingService = $listingService;
    }

    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index', 'show']),
        ];
    }

    public function index()
    {
        $listings = $this->listingService->getPaginatedListings(request(['tag', 'search']));

        return view('listings.index', compact('listings'));
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Listingstoreandupdate $request): RedirectResponse
    {
        $this->listingService->storeListing($request->validated(),$request->file('logo'),Auth::id());

        return redirect('/')->with('message', __('main.job_created'));
    }

    public function show(Listing $listing)
    {
        return view('listings.show', compact('listing'));
    }

    public function edit(Listing $listing)
    {
        return view('Listings.edit', compact('listing'));
    }

    public function update(Listingstoreandupdate $request, Listing $listing): RedirectResponse
    {
        $this->listingService->updateListing($listing,$request->validated(),$request->file('logo'),Auth::id());

        return redirect('/')->with('message', __('main.job_updated'));
    }

    public function destroy(Request $request, Listing $listing): JsonResponse|RedirectResponse
    {
        $this->listingService->deleteListing($listing, Auth::id());

        if ($request->expectsJson()) {
            return response()->json([
                'message' => __('main.job_deleted'),
            ]);
        }

        return redirect('/')->with('message', __('main.job_deleted'));
    }

    public function manage()
    {
        $listings = $this->listingService->getUserListings(Auth::id());

        return view('listings.manage', compact('listings'));
    }
}
