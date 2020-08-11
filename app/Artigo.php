<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artigo extends Model
{
  protected $fillable = ['categoria_id','title','image','keywords','description','content'];
  protected $guarded = ['id', 'created_at', 'update_at'];
}
