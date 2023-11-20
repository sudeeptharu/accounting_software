<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'group_identifier'
    ];

    public function group()
    {
        return $this->belongsTo(LedgerGroup::class,'group_identifier','identifier');
    }
    public function openingBalance()
    {
        $transaction=Transaction::where('transaction_no',1)->first();
        if($transaction){
            $transactionEntry=$transaction->transaction_entries->where('ledger_id',$this->id)->first();
            if($transactionEntry){
                return $transactionEntry->amount;
            }else{
                return '0';
            }
        }else{
            return '0';
        }
    }

    public function getLedgerClassification()
    {
        $group=$this->group;
        while($group){
            if($group->parent){
                $group=$group->parent;
            }else{
                $classification=$group->classification;
                if($classification){
                    return $classification->title;
                }
                return null;
            }
        }
        return null;
    }

    public function ledgerTotalAmount($ledgerId)
    {
        return $this->ledgerAmounts()
            ->where('ledger_id', $ledgerId)
            ->first()
            ->total_amount ?? 0;
    }
}
