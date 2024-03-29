<?php

namespace App\Models;

use App\ImageManipulator;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * Constant for default thumbnail path
     */
    const THUMB_PATH = 'thumbnails/';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'path',
        'size'
    ];

    /**
     * The attributes appended in the JSON form.
     *
     * @var array
     */
    protected $appends = [
        'url_path'
    ];

    public function getUrlPathAttribute()
    {
        return url($this->path);
    }

    /**
     * @param int $w
     * @param int $h
     * @return string
     */
    public function resize($w = null, $h = null)
    {
        if ( ! empty($this->path) && file_exists($this->path))
        {
            return ImageManipulator::resize($w, $h, $this->path, self::THUMB_PATH);
        } else
        {
            return config('paths.placeholder.default');
        }
    }

    /**
     * @param int $w
     * @param int $h
     * @return string
     */
    public function thumbnail($w = 150, $h = 150)
    {
        if ( ! empty($this->path) && file_exists($this->path))
        {
            return ImageManipulator::getThumbnail($w, $h, $this->path, self::THUMB_PATH, str_slug($this->imageable_type));
        } else
        {
            return config('paths.placeholder.default');
        }
    }

    /**
     * Unlink Image
     */
    public function deleteImage()
    {
        if ( ! empty($this->path) && file_exists($this->path))
            unlink($this->path);
    }

    /**
     * @return bool|null
     */
    public function delete()
    {
        $this->deleteImage();

        return parent::delete();
    }
}
