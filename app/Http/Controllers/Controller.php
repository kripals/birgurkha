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
            $img = $image->move('storage/local', $image->getClientOriginalName());

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
}
