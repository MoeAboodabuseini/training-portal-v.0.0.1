<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    public $timestamps = false;
    use HasFactory;
    public function company (): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function requests()
    {
        return $this->hasMany(Requested::class);

    }
    public function reports()
    {
        return $this->hasMany(Report::class);

    }
}
