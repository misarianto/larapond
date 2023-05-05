<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\TemporaryImage;

class DeleteTemporaryImageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $temporaryImage = TemporaryImage::where('folder', request()->getContent())->first();
        if($temporaryImage){
            Storage::deleteDirectory('images/tmp/'.$temporaryImage->folder);
            $temporaryImage->delete();
        }

        return response()->noContent();
    }
}
