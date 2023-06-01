<?php

namespace App\Http\Controllers\Api\V1\Posting;

use App\Http\Controllers\Api\BaseController;
use App\Models\Api\V1\Posting\PostingFileModel;
use Illuminate\Http\Request;

class PostingFileController extends BaseController
{
    public function store(Request $request)
    {
        $fileUpload = $this->upload_image($request, 'posting');

        try {
            $postingFile = new PostingFileModel();
            $postingFile->fill($request->except('file'));
            $postingFile->file = $fileUpload;
            $postingFile->save();

            return $this->successResponse('Publish posting', $postingFile);
        } catch (\Throwable $th) {
            file_exists($fileUpload) && unlink($fileUpload);
            return $this->serverErrorResponse('Server error', $th);
        }
    }
}
