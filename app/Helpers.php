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
    $types    = $types + \App\Models\Type::all()->pluck('name', 'id')->toArray();

    return $types;
}
