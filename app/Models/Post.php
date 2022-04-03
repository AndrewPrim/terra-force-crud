<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'body',
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
