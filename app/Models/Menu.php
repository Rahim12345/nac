<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';

    protected $guarded = [];

    public function blogs()
    {
        return $this->hasMany(Blog::class,'menu_id','id');
    }

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id', 'id');
    }

    public function getParent()
    {
        return $this->hasOne(Menu::class,'id','parent_id');
    }
}
