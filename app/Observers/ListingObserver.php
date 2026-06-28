<?php

namespace App\Observers;

use App\Models\Listing;
use Illuminate\Support\Facades\Storage;

class ListingObserver
{
    public function updating(Listing $listing): void
    {
        if ($listing->isDirty('logo')) {
            $oldLogo = $listing->getOriginal('logo');
            if ($oldLogo && Storage::disk('public')->exists($oldLogo)) {
                Storage::disk('public')->delete($oldLogo);
            }
        }
    }
    public function deleted(Listing $listing): void
    {
        if ($listing->logo && Storage::disk('public')->exists($listing->logo)) {
            $directory = dirname($listing->logo);

            Storage::disk('public')->delete($listing->logo);
            $allFiles = Storage::disk('public')->allFiles($directory);
            $allDirectories = Storage::disk('public')->directories($directory);

            if (empty($allFiles) && empty($allDirectories)) {
                Storage::disk('public')->deleteDirectory($directory);
            }
        }
    }

}
