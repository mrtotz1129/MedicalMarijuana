<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientModel extends Model
{
    protected $table		=	'tblPatient';
    protected $primaryKey	=	'intPatientId';

    public function getNameAttribute()
    {
    	return $this->strLastName . ', ' . $this->strFirstName . ($this->strMiddleName != null ? (' ' . $this->strMiddleName) : '');
    }
}
