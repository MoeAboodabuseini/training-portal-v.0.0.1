<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    use HasFactory;
    
    public function agreed (){
        return $this->belongsTo(Agreed::class);
    }
    public function user (){
        return $this->belongsTo(User::class);
    }
    public function opportunity (){
        return $this->belongsTo(Opportunity::class);
    }
}
