<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    
    // protected $table = 'person';
    // protected $primaryKey = 'person_id';
    // public $timestamps = false;
    
    // protected $fillable = [
    //     'pname',
    //     'fname',
    //     'lname',
    //     'cid',
    //     'pcode',
    //     'sex',
    //     'tel',
    //     'house_id',
    //     'house_regist_type_id',
    //     'pttype'
    // ];

}
