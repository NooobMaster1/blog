<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{
    use HasFactory;

    public function posts()
    {

        return $this->hasMany(Post::class);
    }
    public function scopeFilter($query)
    {
        if (request('search')) {
           return $query->where('Category_name', 'like', '%' . request('search') . '%')
                ->orWhere('slug', 'like', '%' . request('search') . '%');
        }
    }
}
