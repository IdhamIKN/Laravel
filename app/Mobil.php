<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mobil extends Model
{
    use SoftDeletes;

    public $table = 'mobil';

    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $fillable = [
        'mobil',
        'nopol',
        'created_at',
        'updated_at',
    ];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'mobil_id');
    }

}
