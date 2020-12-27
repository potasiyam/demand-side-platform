<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'start_date', 'end_date', 'total_budget', 'daily_budget'];

    /**
     * This will return all the creatives associates with campaign
     *
     * @return HasMany
     */
    public function creatives(): HasMany
    {
        return $this->hasMany(CampaignCreative::class);
    }
}
