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
    ];

    protected $casts = [
        'start' => 'date',
        'end' => 'date',
        'apply_end' => 'date',
    ];

    /**
     * 准許營隊
     */
    public function approve(User $by) {
        $this->approved_by = $by->id;
        $this->approved_at = Carbon::now();
        $this->save();
    }
}
