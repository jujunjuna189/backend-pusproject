<?php

namespace App\Http\Controllers\Api\V1\EmailBase;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Api\V1\EmailBase\EmailBaseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmailBaseController extends BaseController
{
    /**
     * Function store, untuk menyimpan data email ke database
     * @param email
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => EmailBaseModel::$storeRules['email']
            ],
            EmailBaseModel::$messageRules
        );
        if ($validator->fails()) {
            return $this->badRequestResponse($validator->messages());
        }

        $email_base = EmailBaseModel::firstOrNew(['email' => $request->email]);
        $email_base->email = $request->email;
        $email_base->save();
        return $this->successResponse('Mengikuti');
    }
}
