<?php

namespace App\Models;

use Spatie\Tags\HasTags;
use Spatie\MediaLibrary\HasMedia;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\InteractsWithMedia;

class Plat extends Model implements HasMedia
{
    use HasFactory;
    use HasTags;
    use InteractsWithMedia;


    protected $guarded = []; 
}
