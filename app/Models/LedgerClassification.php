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
    public function getLedgers($ledClass)
    {
    $ledgerGroups=LedgerGroup::with('ledgers')
        ->where('classification_identifier',$ledClass)
        ->get();
        return $ledgerGroups->map(function ($group){
            $ledgerSum=$group->ledgers->sum(function ($ledger){
                return $ledger->openingBalance();
            });
            return [
                'group'=>$group,
                'ledgerSum'=>$ledgerSum
            ];
        });
    }


}
