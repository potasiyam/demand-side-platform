<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignCreative extends Model
{
    use HasFactory;

    protected $fillable = ['campaign_id', 'file_name', 'file_path', 'file_extension'];
}
