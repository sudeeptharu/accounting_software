<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'identifier',
        'classification_identifier',
        'parent_identifier',
        'negative_identifier',
        'affects_gross_profit',
    ];
}
