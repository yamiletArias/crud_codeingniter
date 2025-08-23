<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cliente;

class ClienteController extends BaseController
{

  public function index()
  {
    $cliente = new Cliente();

    //SELECT * FROM clientes ORDER BY id DESC
    $datos['clientes'] = $cliente->orderBy('id', 'DESC')->findAll();

    $datos['header'] = view('Layouts/header');
    $datos['footer'] = view('Layouts/footer');

    //index es el nombre del archivo que está en al carpeta views
    return view('Clientes/index', $datos);
  }

  public function editar($id = null)
  {
    $cliente = new Cliente();

    //Query Builder => SELECT * FROM Tabla WHERE id = 1;
    $datos['cliente'] = $cliente->where('id', $id)->first();

    $datos['header'] = view('Layouts/header');
    $datos['footer'] = view('Layouts/footer');

    return view('Clientes/editar', $datos);
  }

  public function editar1()
  {
    $datos['header'] = view('Layouts/header');
    $datos['footer'] = view('Layouts/footer');

    return view('Clientes/editar', $datos);
  }

  public function registrar()
  {
    $datos['header'] = view('Layouts/header');
    $datos['footer'] = view('Layouts/footer');
    //index es el nombre del archivo que está en al carpeta views
    return view('Clientes/registrar', $datos);
  }

  public function guardar()
  {
    //1. Instancia del modelo
    $cliente = new Cliente();

    //2. Array asociativo campo => caja_de_texto

    //$this->request->getVar('apellidos') ====> <input type='text' name='apellidos'>
    $nuevoRegistro = [
      'apellidos' => $this->request->getVar('apellidos'),
      'nombres' => $this->request->getVar('nombres'),
      'dni' => $this->request->getVar('dni'),
      'telefono' => $this->request->getVar('telefono')
    ];

    $cliente->insert($nuevoRegistro);

    //3. Cambiar la vista a listar
    return $this->response->redirect(base_url('clientes'));
  }

  //ELIMINAR
  public function eliminar($id = null)
  {
    $cliente = new Cliente();
    //DELETE FROM Tabla WHERE id = 1;
    $cliente->where('id', $id)->delete($id);
    return $this->response->redirect(base_url('clientes'));
  }



  //ACTUALIZAR
  public function actualizar()
  {
    $cliente = new Cliente();

    $id = $this->request->getVar('id');

    $camposActualizar = [
      'apellidos' => $this->request->getVar('apellidos'),
      'nombres' => $this->request->getVar('nombres'),
      'dni' => $this->request->getVar('dni'),
      'telefono' => $this->request->getVar('telefono')
    ];

    $cliente->update($id, $camposActualizar);
    return $this->response->redirect(base_url('clientes'));
  }

}