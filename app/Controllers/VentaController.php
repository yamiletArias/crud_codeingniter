<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Venta;

Class VentaController extends BaseController
{

    public function index(){
        $venta = new Venta();

        // Consulta con join para traer ventas junto con el nombre del cliente (si existe)
        // También suma la cantidad de productos vendidos por cada venta usando subconsulta
        $datos['ventas'] = $venta
        ->select('ventas.*, clientes.nombres, clientes.apellidos, 
                (SELECT SUM(cantidad) FROM detalleventa WHERE detalleventa.idventa = ventas.id) AS total_cantidad')
        ->join('clientes', 'clientes.id = ventas.idcliente', 'left')
        ->orderBy('ventas.id', 'DESC')
        ->findAll();
        
        $datos['header'] = view('Layouts/header');
        $datos['footer'] = view('Layouts/footer');

        return view('Ventas/index', $datos);
    }

    public function create()
    {
        $datos['header'] = view('Layouts/header');
        $datos['footer'] = view('Layouts/footer');

        return view('Ventas/create', $datos);
    }

}