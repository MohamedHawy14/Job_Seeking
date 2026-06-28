<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'titleAr',
        'titleEn',
        'tags',
        'company',
        'location',
        'email',
        'website',
        'descriptionAr',
        'descriptionEn',
        'logo'
    ];

    public function scopeFilter($query, array $filters) {
        if($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false) {
            $query->where('titleAr', 'like', '%' . request('search') . '%')
                ->orWhere('descriptionAr', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    public function getTitleAttribute()
    {
        return App::getLocale() == 'ar' ? $this->titleAr : $this->titleEn;
    }


    public function getDescriptionAttribute()
    {
        return App::getLocale() == 'ar' ? $this->descriptionAr : $this->descriptionEn;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
