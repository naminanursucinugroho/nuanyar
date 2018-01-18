<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    protected $fillable = ['tgl','judul','konten','cover'];
    protected $visible = ['tgl','judul','konten','cover'];
    public  $timestamps = true;
}
