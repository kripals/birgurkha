<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Intervention\Image\Facades\Image;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param $request
     * @param $image
     * @param $instance
     * @return array|bool
     */
    public function uploadRequestImage($image, $instance)
    {
        if (isset($image))
        {
            $img = $image->move('public/images', $image->getClientOriginalName());

            $imageDetails = [
                'name' => $image->getClientOriginalName(),
                'size' => $img->getSize(),
                'path' => str_replace("storage/", "", (string) $img)
            ];

            if ($instance->images)
            {
                $instance->images->deleteImage();
                $instance->images->update($imageDetails);
            }
            else
            {
                $instance->images()->create($imageDetails);
            }
        }

        return false;
    }
    /**
     * @param $request
     * @param $image
     * @param $instance
     * @return array|bool
     */
    public function uploadRequestFile($file, $instance)
    {
        if (isset($file))
        {
            $f = $file->move('public/files', $file->getClientOriginalName());

            $fileDetails = [
                'file' => (string) $f
            ];
            
            if ( ! empty($instance->file) && file_exists(url($instance->file)))
            {
                unlink($instance->file);
            }
            
            $instance->update($fileDetails);
        }

        return false;
    }
}
