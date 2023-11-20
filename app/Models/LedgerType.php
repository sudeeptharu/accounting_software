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

    public function getLedgersAttribute()
    {
        return Ledger::with('group.ledger_type')->whereHas('group', function ($query) {
                $query->where('ledger_type', $this->identifier);
            })->get();
    }
}
