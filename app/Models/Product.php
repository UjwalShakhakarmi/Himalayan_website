<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'Category', 'Size','Qunatity_Box','Qunatity_piece','man_date','exp_date','Desc','ProductImg','ProductImgPath'];

}
