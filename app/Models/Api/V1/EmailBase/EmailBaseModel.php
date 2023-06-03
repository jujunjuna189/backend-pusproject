<?php

namespace App\Models\Api\V1\EmailBase;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailBaseModel extends Model
{
    use HasFactory;

    protected $table = 'email_base';
    protected $guarded = ['id'];

    public static $storeRules = [
        'email' => ['required', 'email'],
    ];

    public static $messageRules = [
        'required' => ':attribute harus diisi',
        'email' => ':attribute masukan harus berupa email',
    ];
}
