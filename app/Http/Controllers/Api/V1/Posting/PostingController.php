<?php

namespace App\Http\Controllers\Api\V1\Posting;

use App\Http\Controllers\Api\BaseController;
use App\Models\Api\V1\Posting\PostingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostingController extends BaseController
{
    /**
     * 
     */
    public function show()
    {
        $posting = PostingModel::with('postingFile')->paginate();
        return $this->successResponse('Berhasil ambil data posting', $posting);
    }

    /**
     * Function mengambil data posting by user
     */
    public function showByUser()
    {
        $posting = PostingModel::with('postingFile')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate();
        return $this->successResponse('Berhasil ambil data posting', $posting);
    }

    /**
     * Function store, untuk menyimpan data posting ke database
     * @param file
     * @param style
     * @param title
     * @param price
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), PostingModel::$storeRules, PostingModel::$messageRules);
        if ($validator->fails()) {
            return $this->badRequestResponse($validator->messages());
        }

        DB::beginTransaction();
        try {
            $posting = new PostingModel();

            $posting->fill($request->except('user_id'));
            $posting->user_id = Auth::user()->id;
            $posting->save();

            $posting_file = new PostingFileController();
            $newRequest = new Request();
            $newRequest->merge(['posting_id' => $posting->id, 'style' => $request->style]);
            $newRequest->files->set('file', $request->file('file'));
            $posting_file = $posting_file->store($newRequest);
            if ($posting_file->original['status'] !== 'success') {
                DB::rollback();
                return $this->badRequestResponse('Gagal posting file');
            }

            DB::commit();
            return $this->successResponse('Publish posting', $posting);
        } catch (\Throwable $th) {
            DB::rollback();
            return $this->serverErrorResponse('Server error', $th);
        }
    }
}
