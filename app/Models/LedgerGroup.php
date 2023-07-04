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
}
