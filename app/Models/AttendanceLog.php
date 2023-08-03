<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttendanceLog extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }
}
