<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountModel extends Model
{
    protected $table		=	'tblDiscount';
    protected $primaryKey	=	'intDiscountId';	

    public function getDiscountTypeAttribute(){
    	if ($this->intDiscountTypeId == 1){
    		return "Percentage";
    	}
    	return "Amount";
    }
}
