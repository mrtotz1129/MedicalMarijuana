<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    protected $table 		=	'tblEmployee';

    protected $primaryKey	=	'intEmployeeId';
}
