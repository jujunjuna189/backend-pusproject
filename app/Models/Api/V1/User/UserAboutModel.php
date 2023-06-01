<?php

namespace App\Models\Api\V1\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAboutModel extends Model
{
    use HasFactory;

    protected $table = 'users_about';
    protected $guarded = ['id'];
    protected $appends = ['skills_decode'];

    public function getSkillsDecodeAttribute()
    {
        return json_decode($this->skills);
    }
}
