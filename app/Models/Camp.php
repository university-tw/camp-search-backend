<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Camp extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'school',
        'department',
        'start',
        'end',
        'apply_end',
        'price',
        'url',
        'approved_at',
        'approved_by',

        'created_by',

        'priority',
        'recommend',
        'tags'
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
}
