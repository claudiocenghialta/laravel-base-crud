<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name', 'surname', 'mail','phone','address','city','postalCode',
    ];
}
