<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    protected $table 		=	'tblEmployee';

    protected $primaryKey	=	'intEmployeeId';

    public function getNameAttribute()
    {
    	return $this->strLastName . ', ' . $this->strFirstName . ($this->strMiddleName != null ? (' ' . $this->strMiddleName) : '');
    }
}
