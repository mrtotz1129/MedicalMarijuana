<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientModel extends Model
{
    protected $table		=	'tblPatient';
    protected $primaryKey	=	'intPatientId';
}
