<?php

namespace App\Models;

use App\Models\Scopes\ClientScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'description',
        'price',
        'client_id',
        'category_id',
        'original_name',
        'stored_filename',
    ];

    protected static function booted()
    {
        static::addGlobalScope(new ClientScope());
    }
}
