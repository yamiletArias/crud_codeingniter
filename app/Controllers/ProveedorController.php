<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Proveedor;

class ProveedorController extends BaseController
{

    public function index()
    {

        $proveedor = new Proveedor();

        $datos['proveedores'] = $proveedor->orderBy('id', 'DESC')->findAll();

        $datos['header'] = view('Layouts/header');
        $datos['footer'] = view('Layouts/footer');

        return view('Proveedores/index', $datos);
    }

    public function create()
    {
        $datos['header'] = view('Layouts/header');
        $datos['footer'] = view('Layouts/footer');

        return view('Proveedores/create', $datos);
    }

    public function edit($id = null)
    {
        $proveedor = new Proveedor();

        $datos['proveedor'] = $proveedor->where('id', $id)->first();

        $datos['header'] = view('Layouts/header');
        $datos['footer'] = view('Layouts/footer');

        return view('Proveedores/edit', $datos);
    }

    public function save()
    {
        $proveedor = new Proveedor();

        $nuevoRegistro = [
            'nombre' => $this->request->getVar('nombre'),
            'telefono' => $this->request->getVar('telefono'),
            'email' => $this->request->getVar('email'),
            'direccion' => $this->request->getVar('direccion')
        ];

        $proveedor->insert($nuevoRegistro);

        return $this->response->redirect(base_url('proveedores'));
    }

    public function delete($id = null)
    {
        $proveedor = new Proveedor();

        $proveedor->where('id', $id)->delete($id);
        /* if($provedor->find($id)){
            $provedor->delete($id);
        } */
        return $this->response->redirect(base_url('proveedores'));
    }

    public function update()
    {
        $proveedor = new Proveedor();

        $id = $this->request->getVar('id');

        $camposActualizar = [
            'nombre' => $this->request->getVar('nombre'),
            'telefono' => $this->request->getVar('telefono'),
            'email' => $this->request->getVar('email'),
            'direccion' => $this->request->getVar('direccion')
        ];

        $proveedor->update($id, $camposActualizar);
        return $this->response->redirect(base_url('proveedores'));
    }
}