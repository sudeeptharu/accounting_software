<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerGroup extends Model
{
    use HasFactory;
    protected $guarded= [];

    public function classification()
    {
        return $this->belongsTo(LedgerClassification::class,'classification_identifier','identifier');
    }
    public function negative_ledger()
    {
        return $this->hasOne(LedgerGroup::class,'negative_identifier','identifier');
    }
    public function parent()
    {
        return $this->belongsTo(LedgerGroup::class,'parent_identifier','identifier');
    }
    public function children()
    {
        return $this->hasMany(LedgerGroup::class,'parent_identifier','identifier');
    }
    public function ledgers()
    {
        return $this->hasMany(Ledger::class, 'group_identifier', 'identifier');
    }
    public function ledger_type()
    {
        return $this->belongsTo(LedgerType::class, 'ledger_type','identifier');
    }

    public function endNodeLedgers()
    {
        return $this->hasMany(Ledger::class, 'group_identifier', 'identifier')
            ->whereDoesntHave('children');
    }
    public function allDescendants()
    {
        return $this->children()->with('allDescendants','ledgers',);
    }

    public static function amount($ledger_id)
    {
        $amt=TransactionEntry::where('ledger_id',$ledger_id)->first();
        return $amt->amount;
    }
}
