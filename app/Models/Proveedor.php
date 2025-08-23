<?php
// PROVEEDORES
namespace App\Models;
use CodeIgniter\Model;
    
class Proveedor extends Model{

  //Configurar 3 parámetros
  //1. Nombre de la tabla
  protected $table = 'proveedores';

  //2. Clave primaria
  protected $primaryKey = 'id';

  //3. Campos operar
  protected $allowedFields = ['nombre', 'telefono', 'email', 'direccion'];

}