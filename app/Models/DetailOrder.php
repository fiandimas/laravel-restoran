<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
  protected $table = 'detail_order';
  protected $fillable = [
    'id_order',
    'id_menu',
    'qty',
    'information',
    'status_order_detail'
  ];
}
