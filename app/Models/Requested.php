<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Requested extends Model
{
    public $timestamps = false;

    protected $table = 'requests';



    use HasFactory;

    public function opportunity ()
    {
        return $this->belongsTo(Opportunity::class);
    }
    public function user ()
    {
        return $this->belongsTo(User::class,);
    }
    public function company ()
    {
        return $this->belongsTo(User::class,'company_id','id');
    }
    public function agreed ()
    {
        return $this->hasMany(Agreed::class,'request_id','id');
    }
}
