<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name'];

    protected $hidden = [
        'updated_at',
    ];

    protected $appends = ['date'];

    public function getDateAttribute() {
        return $this->created_at->format('Y-m-d');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function intervals(): BelongsToMany
    {
        return $this->belongsToMany(Interval::class);
    }
}
