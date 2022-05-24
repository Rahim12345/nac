<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PMission extends Model
{
    use HasFactory;

    protected $table = 'p_missions';

    protected $guarded = [];
}
