<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sqits\UserStamps\Concerns\HasUserStamps;

class Audit extends Model
{
    use HasFactory;
    use HasUserStamps;

    // protected $guarded = ['id'];
    protected $table = 'audits';
}
