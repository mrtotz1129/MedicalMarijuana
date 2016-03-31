<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPriceModel extends Model
{
    protected $table		=	'tblItemPrice';
    protected $primaryKey	=	'intItemPriceId';

    public function setMeasurementAttribute($value){
    	$this->attributes['measurement'] = $value;
    }

    public function getMeasurementAttribute(){
    	return $this->attributes['measurement'];
    }
}
