<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Api\BaseController;
use App\Models\Api\V1\User\UserModel;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    /**
     * Function show untuk menampilkan data user yang online
     */
    public function show()
    {
        $users = UserModel::take(50)->orderBy('updated_at', 'desc')->get();
        return $this->successResponse('Berhasil ambil data user', $users);
    }
}
