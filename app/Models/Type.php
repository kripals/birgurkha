<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'section',
        'name',
        'visible',
        'position',
        'type',
        'start_date',
        'end_date',
        'add_on_words',
        'before_start_phrase',
        'view_all_buttons',
        'entity_id',
        'entity_type',
        'background_color'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
