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
        'type_id'
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
        return $this->type->section;
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
        return $this->belongsTo(LandingPage::class, 'landing_page_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
