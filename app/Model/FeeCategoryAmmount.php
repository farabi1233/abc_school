<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FeeCategoryAmmount extends Model
{
    public function fee_category(){
        return $this->belongsTo(FeeCategory::class,'fee_category_id','id');
    }

public function student_class(){
    return $this->belongsTo(StudentClass::class,'class_id','id');
}
}