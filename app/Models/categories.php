<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    /** @use HasFactory<\Database\Factories\CategoriesFactory> */
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'ten_danh_muc',
        'trang_thai',
    ];

    protected $casts = [
        'trang_thai' => 'boolean',
    ];

    //tao moi lien he voi products
    public function products(){
        return $this->hasMany(Products::class,'categories_id');
    }
}
