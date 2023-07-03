<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerClassification extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'identifier'
    ];

    public function groups()
    {
        return $this->hasMany(LedgerGroup::class,'classification_identifier','identifier');
    }
}
