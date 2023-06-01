<?php

namespace App\Models\Api\V1\Posting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostingFileModel extends Model
{
    use HasFactory;

    protected $table = 'posting_file';
    protected $guarded = ['id'];

    public function getFileAttribute($file)
    {
        $file = url("$file");
        return $file;
    }

    public function getStyleAttribute($style)
    {
        $style = json_decode($style);
        return $style;
    }
}
