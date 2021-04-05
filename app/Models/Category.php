<?php

namespace App\Models;

use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Translatable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use  InteractsWithMedia, HasUploader,SoftDeletes, Translatable;

    protected $table = 'categories';

    public $timestamps = true;

    protected $dates = ['deleted_at'];
    public $translatedAttributes  = ['title'];
    protected $with=['translations'];
    protected $fillable = array(
        'created_by',
        'updated_by'
    );
    public function events()
    {
        return $this->belongsToMany('App\Models\Event', 'category_event');
    }

}
