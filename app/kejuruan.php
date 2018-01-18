<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kejuruan extends Model
{
    protected $fillable = ['nama','profil','cover'];
    protected $visible = ['nama','profil','cover'];
    public  $timestamps = true;
}
