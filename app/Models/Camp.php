<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Camp extends Model {
    use HasFactory;

    protected $with = [
        'offers'
    ];

    protected $fillable = [
        'name',
        'school',
        'description',
        'department',
        'start',
        'end',
        'apply_end',
        'apply_notice',
        'price',
        'url',

        'status',

        'created_by',

        'priority',
        'recommend',
        'tags',

        'comment'
    ];

    protected $casts = [
        'start' => 'date',
        'end' => 'date',
        'apply_end' => 'date',
        'approved_at' => 'datetime',
        'recommend' => 'boolean',
        'tags' => 'json'
    ];

    public function owner() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function favorited_by() {
        return $this->belongsToMany(User::class, 'user_favorite_camps');
    }

    public function offers(): HasMany {
        return $this->hasMany(Offer::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
