<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerType extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'identifier'
    ];

    public function ledger_groups()
    {
        return $this->hasMany(LedgerGroup::class,'ledger_type', 'identifier');
    }
}
