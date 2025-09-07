<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeDocument extends Model
{
    protected $table = 'type_documents';

    protected $fillable = [
        'name'
    ];

    public static function getIdByNameOrDefault(?string $name, int $defaultId = 1): int
    {
        if (!$name) {
            return $defaultId;
        }

        $typeDoc = self::where('name', $name)->first();

        return $typeDoc ? $typeDoc->id : $defaultId;
    }
}
