<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RequirementModel;

class DiscountModel extends Model
{
    protected $table		=	'tblDiscount';
    protected $primaryKey	=	'intDiscountId';	

    public function requirements(){
    	return $this->hasMany('App\RequirementModel');
    }

    public function getDiscountTypeAttribute(){
    	if ($this->intDiscountTypeId == 1){
    		return "Percentage";
    	}
    	return "Amount";
    }
}
