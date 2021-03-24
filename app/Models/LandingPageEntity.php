<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingPageEntity extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'entity_id',
        'magento_type',
        'name',
        'position',
        'landing_page_id',
        'description_text',
        'type_id',
        'image',
        'inner_landing_page'
    ];

    /**
     * The attributes appended in the JSON form.
     *
     * @var array
     */
    protected $appends = [
        'type_name'
    ];

    /**
     * @return mixed
     */
    public function getTypeNameAttribute()
    {
        return $this->type ? $this->type->section : 0;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function landingPage()
    {
        return $this->belongsTo(Local::class, 'landing_page_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function innerLandingPage()
    {
        return $this->belongsTo(Local::class, 'inner_landing_page');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function images()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
