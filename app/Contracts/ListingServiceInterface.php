<?php

namespace App\Contracts;

use App\Models\Listing;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ListingServiceInterface
{
    public function getPaginatedListings(array $filters, int $perPage = 2): LengthAwarePaginator;

    public function storeListing(array $data, ?object $logoFile, int $userId): Listing;

    public function updateListing(Listing $listing, array $data, ?object $logoFile, int $userId): Listing;

    public function deleteListing(Listing $listing, int $userId): void;

    public function getUserListings(int $userId): Collection;
}
