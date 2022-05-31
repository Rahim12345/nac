<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentIssuesCategory extends Model
{
    use HasFactory;

    protected $table = 'current_issues_categories';
    protected $guarded = [];
}
