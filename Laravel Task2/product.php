<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Function_;

class product extends Model
{
    use HasFactory;
    protected $guarded = [''];
    function category()
    {
        return $this->belongsTo(category::class);
    }
    public static $rules = [
        'name' => 'required',
        'price' => 'required',
        'discount' => 'required',
        'description' => 'required',
        'category_id' => 'required',

    ];
    public function getPrice()
    {
        return $this->price - $this->price * $this->discount;
    }
}