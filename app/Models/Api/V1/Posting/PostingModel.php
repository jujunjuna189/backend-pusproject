<?php

namespace App\Models\Api\V1\Posting;

use App\Models\Api\V1\User\UserModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PostingModel extends Model
{
    use HasFactory;

    protected $table = 'posting';
    protected $guarded = ['id'];

    public static $getRules = [
        'id' => ['required'],
    ];

    public static $storeRules = [
        'title' => ['required', 'min:3'],
        'file' => ['required'],
    ];

    public static $messageRules = [
        'required' => ':attribute harus diisi',
        'min:5' => ':attribute minimal 5 karakter',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(UserModel::class, 'id', 'user_id');
    }

    public function postingFile(): HasMany
    {
        return $this->hasMany(PostingFileModel::class, 'posting_id', 'id');
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($posting) {
            $posting->postingFile()->delete();
        });
    }
}
