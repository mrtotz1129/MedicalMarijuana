<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceModel extends Model
{
    protected $table		=	'tblService';
    protected $primaryKey	=	'intServiceId';

    public function prices(){
    	$this->hasMany('App\ServicePriceModel');
    }
}
