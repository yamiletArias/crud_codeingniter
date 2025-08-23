<?php

// PROVEEDORES
namespace App\Models;

use CodeIgniter\Model;
    
class Proveedor extends Model{

  protected $table = 'proveedores';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nombre', 'telefono', 'email', 'direccion'];

}