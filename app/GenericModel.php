<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GenericModel extends Model
{
    protected $table		=	'tblGenericName';
    protected $primaryKey	=	'intGenericNameId';
}
