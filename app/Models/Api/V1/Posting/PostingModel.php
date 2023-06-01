<?php

namespace App\Models\Api\V1\Posting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PostingModel extends Model
{
    use HasFactory;

    protected $table = 'posting';
    protected $guarded = ['id'];

    public static $storeRules = [
        'title' => ['required', 'min:3'],
        'file' => ['required'],
    ];

    public static $messageRules = [
        'required' => ':attribute harus diisi',
        'min:5' => ':attribute minimal 5 karakter',
    ];

    public function postingFile(): HasMany
    {
        return $this->hasMany(PostingFileModel::class, 'posting_id', 'id');
    }
}
