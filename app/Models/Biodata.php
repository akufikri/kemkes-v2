<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'biodatas';

    protected $fillable = [
        'slug',
        'no_document',
        'patient_name',
        'sex',
        'date_of_birth',
        'nationality',
        'nationality_doc',
        'disease',
        'facility',
        'id_type_document',
        'status'
    ];

    public function typeDocument()
    {
        return $this->belongsTo(TypeDocument::class, 'id_type_document');
    }
}
