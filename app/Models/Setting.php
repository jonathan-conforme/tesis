<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['canton_name', 'date', 'youtube_video_1', 'youtube_video_2', 'page_title', 'page_subtitle'];

}
