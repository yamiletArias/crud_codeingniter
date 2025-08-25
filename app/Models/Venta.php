<?php

namespace App\Models;
use CodeIgniter\Model;

Class Venta extends Model
{

    protected $table = 'ventas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['fecha', 'total', 'idcliente'];
    protected $useTimestamps = true;

}