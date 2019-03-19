<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $table = 'order';
  protected $fillable = [
    'num_table',
    'id_user',
    'information',
    'status_order'
  ];
}
