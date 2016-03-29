<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicePriceModel extends Model
{
    protected $table		=	'tblServicePrice';
    protected $primaryKey	=	'intServicePriceId';	

    public function service(){
    	$this->belongsTo('App\ServiceModel');
    }
}
