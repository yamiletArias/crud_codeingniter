<?php

namespace App\Models;
use CodeIgniter\Model;

class Cliente extends Model{

  //Configurar 3 parámetros
  //1. Nombre de la tabla
  protected $table = 'clientes';

  //2. Clave primaria
  protected $primaryKey = 'id';

  //3. Campos operar
  protected $allowedFields = ['apellidos','nombres','dni','telefono'];

}