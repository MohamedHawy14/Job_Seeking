<?php

namespace App\Services;

use App\Contracts\ListingServiceInterface;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ListingService implements ListingServiceInterface
{
    public function getPaginatedListings(array $filters, int $perPage = 2): LengthAwarePaginator
    {
        return Listing::latest()
            ->filter($filters)
            ->paginate($perPage);
    }

    public function storeListing(array $data, ?object $logoFile, int $userId): Listing
    {
        if ($logoFile) {
            $data['logo'] = $logoFile->store('listings', 'public');
        }

        $data['user_id'] = $userId;

        return Listing::create($data);
    }

    public function updateListing(Listing $listing, array $data, ?object $logoFile, int $userId): Listing
    {
        if ($listing->user_id !== $userId) {
            abort(403, __('main.unauthorized'));
        }

        if ($logoFile) {
            $data['logo'] = $logoFile->store('listings', 'public');
        } else {
            unset($data['logo']);
        }

        $listing->update($data);

        return $listing;
    }

    public function deleteListing(Listing $listing, int $userId): void
    {
        if ($listing->user_id !== $userId) {
            abort(403, __('main.unauthorized'));
        }
        $listing->delete();
    }

    public function getUserListings(int $userId): Collection
    {
        $user = User::findOrFail($userId);
        return $user->listings()->get();
    }
}
