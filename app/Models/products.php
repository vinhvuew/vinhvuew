<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class products extends Model
{
    /** @use HasFactory<\Database\Factories\ProductsFactory> */
    use HasFactory, SoftDeletes;


    protected $fillable = [

      'ma_san_pham',
        'ten_san_pham',
        'category_id',
        'hinh_anh',
        'gia',
        'gia_khuyen_mai',
        'so_luong',
        'ngay_nhap',
        'mo_ta',
        'trang_thai'
    ];
    protected $dates = ['deleted_at'];

    public function category(){
        return $this->belongsTo(categories::class,'category_id');
    }


}
