<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DiscountModel;

class RequirementModel extends Model
{
	protected $table		=	'tblRequirement';
	protected $primaryKey	=	'intRequirementId';

	public function discount(){
		return $this->belongsTo('App\DiscountModel');
	}
}
