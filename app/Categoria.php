<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  protected $fillable = ['title','keywords','description'];
  protected $guarded = ['id', 'created_at', 'update_at'];
}
