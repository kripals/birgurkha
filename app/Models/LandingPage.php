<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        'urlkey',
        'visible',
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function landingPagesEntites()
    {
        return $this->hasMany(LandingPageEntity::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
