<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $guarded = [];

    public function menu()
    {
        return $this->hasOne(Menu::class,'id','menu_id');
    }

    public function images()
    {
        return $this->hasMany(BlogImages::class,'blog_id','id');
    }

    public function cover()
    {
        return $this->hasOne(BlogImages::class,'blog_id','id')->where('is_cover',1);
    }
}
