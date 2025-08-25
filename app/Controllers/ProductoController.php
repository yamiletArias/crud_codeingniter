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