<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Api\BaseController;
use App\Models\Api\V1\User\UserAboutModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAboutController extends BaseController
{
    /**
     * Function show untuk menampilkan data
     * @param user_id
     */
    public function show(Request $request)
    {
        $user_about = UserAboutModel::where('user_id', $request->user_id)->first();
        return $this->successResponse('Berhasil ambil data user about', $user_about);
    }

    /**
     * Function store untuk menyimpan data, buat baru atau update
     * @header token
     * @param skills
     * @param biography
     * @param testimonials
     */
    public function store(Request $request)
    {
        $user_about = UserAboutModel::firstOrNew(['user_id' => Auth::user()->id]);

        $user_about->fill($request->except('role_key'));
        $user_about->role_key = $user_about->role_key ? $user_about->role_key : 1;
        $user_about->save();

        return $this->successResponse('Data berhasil disimpan', $user_about);
    }

    /**
     * Function delete untuk menghapus data
     * @header token
     */
    public function delete()
    {
        $user_about = UserAboutModel::where(['user_id' => Auth::user()->id])->first();
        $user_about->delete();

        return $this->successResponse('Data berhasil dihapus');
    }
}
