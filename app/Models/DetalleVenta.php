<?php
namespace App\Models;
use CodeIgniter\Model;

Class DetalleVenta extends Model
{

    protected $table = 'detalleventa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['idventa', 'idproducto', 'cantidad', 'precio'];
    
}