<?php

namespace App\Models\Api\V1\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Sanctum\HasApiTokens;

class UserModel extends Model
{
    use HasApiTokens, HasFactory;

    protected $table = 'users';
    protected $guarded = ['id'];

    public static $getRules = [
        'name' => ['required'],
        'email' => ['required', 'email'],
        'password' => ['required'],
    ];

    public static $storeRules = [
        'name' => ['required', 'string', 'max:100'],
        'email' => ['required', 'email', 'unique:users'],
        'password' => ['required', 'min:6'],
    ];

    public static $messageRules = [
        'required' => ':attribute harus diisi',
        'email' => ':attribute masukan harus berupa email',
        'string' => ':attribute masukan harus berupa teks',
        'name.max' => ':attribute maximal 100 karakter',
        'password.min' => ':attribute minimal 6 karakter',
        'unique' => ':attribute sudah digunakan',
    ];

    public function userAbout(): HasOne
    {
        return $this->hasOne(UserAboutModel::class, 'user_id', 'id');
    }
}
