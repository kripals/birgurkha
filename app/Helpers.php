<?php

/**
 * @param $value
 * @param string $dash
 * @return string
 */
function display($value, $dash = 'NA')
{
    if (empty($value))
    {
        return $dash;
    }

    return $value;
}

/**
 * @param $width
 * @param null $username
 * @return mixed
 * @internal param $guard
 */
function user_avatar($width, $username = null)
{
    if ($username)
    {
        $user = \App\Models\User::whereUsername($username)->first();
    }
    else
    {
        $user = auth()->user();
    }

    if ($image = $user->image)
    {
        return asset($image->thumbnail($width, $width));
    }
    else
    {
        return asset(config('paths.placeholder.avatar'));
    }
}

/**
 * @param $width
 * @param null $entity
 * @return mixed
 */
function thumbnail($width, $entity = null)
{
    if ( ! is_null($entity))
    {
        if ($image = $entity->image)
        {
            return asset($image->thumbnail($width, $width));
        }
    }

    return asset(config('paths.placeholder.default'));
}

/**
 * @return \App\Models\Type[]|\Illuminate\Database\Eloquent\Collection
 */
function typesArray()
{
    $types[0] = '-';
    $types    = $types + \App\Models\Type::where('is_landing', 0)->pluck('section', 'id')->toArray();

    return $types;
}

/**
 * @return \App\Models\Type[]|\Illuminate\Database\Eloquent\Collection
 */
function typesArrayLanding()
{
    $types[0] = '-';
    $types    = $types + \App\Models\Type::where('is_landing', 1)->pluck('section', 'id')->toArray();

    return $types;
}

/**
 * @return \App\Models\Type[]|\Illuminate\Database\Eloquent\Collection
 */
function landingPagesArray()
{
    $landingPages[0] = '-';

    $landingPages    = $landingPages + \App\Models\Local::where('magento_type', 'LANDING_PAGE')->pluck('name', 'id')->toArray();

    return $landingPages;
}
