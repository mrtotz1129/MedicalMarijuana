<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
    protected $table		=	'tblItem';
    protected $primaryKey	=	'intItemId';

    public function setItemCategoryAttribute($value){
    	$this->attributes['item_category'] = $value;
    }

    public function getItemCategoryAttribute(){
    	return $this->attributes['item_category'];
    }

    public function setGenericNameAttribute($value){
    	$this->attributes['generic_name'] = $value;
    }

    public function getGenericNameAttribute(){
    	return $this->attributes['generic_name'];
    }

    public function setInventoryAttribute($value){
        $this->attributes['inventory'] = $value;
    }

    public function getInventoryAttribute(){
        return $this->attributes['inventory'];
    }
}
