<?php

namespace App\Services;

use Intervention\Image\Facades\Image;

class ImageCoverService
{
    public function updateImage($model, $request)
    {
        $image = Image::make($request->file('imageCover'));
        
        if (!empty($model->imageCover)) {
            $currentImage = public_path() . $model->imageCover;

            if (file_exists($currentImage) && $currentImage != public_path() . '/images/bt.jpg') {
                unlink($currentImage);
            }
        }

        $file = $request->file('imageCover');
        $extension = $file->getClientOriginalExtension();

        if ($request->width) {
            $image->crop(
                $request->width,
                $request->height,
                $request->left,
                $request->top
            );
        }

        $name = time() . '.' . $extension;
        $image->save(public_path() . '/images/' . $name);
        $model->imageCover = '/images/' .$name;

        return $model;
    }
}