<?php

namespace App\Models;

use CodeIgniter\Model;

Class Producto extends Model{
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'descripcion', 'precio', 'descuento', 'idproveedor'];
}