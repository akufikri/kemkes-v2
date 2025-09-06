<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $table = 'certificates';

    protected $fillable = [
        'id_biodata',
        'vaccine_name',
        'start_date',
        'docter',
        'batch_number',
        'expired_date',
        'next_booster',
        'dease_target'
    ];

    public function biodata()
    {
        return $this->belongsTo(Biodata::class, 'id_biodata');
    }
}
