<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable=['ProductName','Price','Amount','Available','category_id'];

    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    use HasFactory;


}
