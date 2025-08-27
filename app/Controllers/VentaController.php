<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cliente;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Venta;

class VentaController extends BaseController
{

    public function index()
    {
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
        $cliente = new Cliente();
        $producto = new Producto();

        $datos['clientes'] = $cliente->findAll(); //ENCONTRAR TODO
        $datos['productos'] = $producto->findAll();

        $datos['header'] = view('Layouts/header');
        $datos['footer'] = view('Layouts/footer');

        return view('Ventas/create', $datos);
    }

    public function save()
    {
        $ventaM = new Venta();
        $detalleVentaM = new DetalleVenta();
        $productosM = new Producto();

        $idcliente = $this->request->getVar('idcliente');
        $productos = $this->request->getVar('productos');
        $cantidad = $this->request->getVar('cantidad');

        //CALCULAMOS EL TOTAL
        $total = 0;
        foreach ($productos as $idproducto) {
            //$producto = $this->db->table('productos')->where('id', $idproducto)->get()->getRow();
            $producto = $productosM->find($idproducto);
            if ($producto) {
                $total += $producto['precio'] * $cantidad;
            }
        }

        $nuevoRegistroVenta = [
            'total' => $total,
            'idcliente' => $idcliente
        ];
        $ventaM->insert($nuevoRegistroVenta);

        $newIdVenta = $ventaM->getInsertID();

        foreach ($productos as $idproducto) {
            $producto = $productosM->find($idproducto);
            if ($producto) {
                $nuevoRegistroDetalle = [
                    'idventa' => $newIdVenta,
                    'idproducto' => $idproducto,
                    'cantidad' => $cantidad,
                    'precio' => $producto['precio']
                ];
                $detalleVentaM->insert($nuevoRegistroDetalle);
            }
        }
        return $this->response->redirect(base_url('ventas'));

    }

    public function delete($id = null)
    {
        $venta = new Venta();
        $detalleVenta = new DetalleVenta();

        /* $idventa = $this->request->getVar('id');
        $iddetventa = $this->request->getVar('idventa'); */

        $detalleVenta->where('idventa', $id)->delete();
        $venta->where('id', $id)->delete();

        return $this->response->redirect(base_url('ventas'));
    }


    /* public function store()
    {
        $venta = new Venta();
        $detalleventa = new DetalleVenta();

    } */

}