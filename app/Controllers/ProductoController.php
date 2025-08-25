<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Producto;
use App\Models\Proveedor;

class ProductoController extends BaseController
{

    public function index()
    {
        $producto = new Producto();

        //$datos['productos'] = $producto->orderBy('id', 'DESC')->findAll();

        /**
         * 1.SELECCIONAMOS TODOS LOS CAMPOS DE PRODUCTOS Y LO RENOMBRAMOS PARA EVITAR CONFUSIONES
         * 2.JOIN => HACE UN LEFT JOIN (UNION IZQUIERDA) CON LA TABLA PROVEEDORES
         * ("COMO ES UN LEFT JOIN TRAE TMB LOS PRODUCTOS QUE NO TIENEN PROVEEDOR ASGINADO [NOMBREPROV = NULL]")
         * 3.ORDERBY => ORDENAR POR (POR ID Y DESC)
         * 4.FINDALL => ENCUENTRA TODOS LOS REGISTRO[] Y LO MUESTRA
         */
        $datos['productos'] = $producto
        ->select('productos.*, proveedores.nombre as nombreprov')
        ->join('proveedores', 'proveedores.id = productos.idproveedor', 'left')
        ->orderBy('productos.id', 'DESC')
        ->findAll();

        $datos['header'] = view('Layouts/header');
        $datos['footer'] = view('Layouts/footer');

        return view('Productos/index', $datos);
    }

    public function edit($id = null)
    {
        $producto = new Producto();
        $datos['producto'] = $producto->where('id', $id)->first();

        //obtenemos todos los proveedores registrados y se guardara en ['proveedores']
        $proveedor = new Proveedor();
        $datos['proveedores'] = $proveedor->findAll();

        $datos['header'] = view('Layouts/header');
        $datos['footer'] = view('Layouts/footer');

        return view('productos/edit', $datos);
    }

    public function create()
    {

        $proveedor = new Proveedor();
        $datos['proveedores'] = $proveedor->findAll();

        $datos['header'] = view('Layouts/header');
        $datos['footer'] = view('Layouts/footer');

        return view('productos/create', $datos);
    }

    public function save()
    {
        $producto = new Producto();

        /**
         * @var mixed PARA REGISTRAR
         * 1. obtenemos el id del proveedor en la tabla productos
         * 2. operador ternario => Luego si $idproveedor es una cadena vacia ('') entonces se cambia por null, 
         * sino se deja como esta 
         */
        $idproveedor = $this->request->getVar('idproveedor');
        $idproveedor = ($idproveedor === '') ? null : $idproveedor;

        $nuevoRegistro = [
            'nombre' => $this->request->getVar('nombre'),
            'descripcion' => $this->request->getVar('descripcion'),
            'precio' => $this->request->getVar('precio'),
            'descuento' => $this->request->getVar('descuento'),
            'idproveedor' => $idproveedor
        ];

        $producto->insert($nuevoRegistro);

        return $this->response->redirect(base_url('productos'));
    }

    public function update()
    {
        $producto = new Producto();

        $id = $this->request->getVar('id');

        /**
         * @var mixed PARA ACTUALIZAR
         * 1. obtenemos el id del proveedor en la tabla productos
         * 2. operador ternario => Luego si $idproveedor es una cadena vacia ('') entonces se cambia por null, 
         * sino se deja como esta 
         */
        $idproveedor = $this->request->getVar('idproveedor');
        $idproveedor = ($idproveedor === '') ? null : $idproveedor;

        $updateProducto = [
            'nombre' => $this->request->getVar('nombre'),
            'descripcion' => $this->request->getVar('descripcion'),
            'precio' => $this->request->getVar('precio'),
            'descuento' => $this->request->getVar('descuento'),
            'idproveedor' => $idproveedor
        ];

        $producto->update($id, $updateProducto);

        return $this->response->redirect(base_url('productos'));
    }

    public function delete($id = null)
    {
        $producto = new Producto();
        $producto->where('id', $id)->delete($id);
        return $this->response->redirect(base_url('productos'));
    }

}