<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreed extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    public function reports(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Report::class);
    }
    public function request()
    {
        return $this->belongsTo(Requested::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'supervisor_id','id');
    }
    use HasFactory;
}
