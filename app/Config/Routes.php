<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Ruta que contiene un / es la principal => www.miweb.com
$routes->get('/', 'Home::index');

//Las rutas que se acceden por GET son las que se utilizan como URL
//Cuando se tratan de POST son por FORMULARIO

//miweb.com/clientes
//$objeto->metodo()   Se utiliza cuando $objeto es una instancia de una clase
//Clase::metodo()     Se está utilizando un método sin instanciar la clase

//RUTAS DE CLIENTE

$routes->get('/clientes', 'ClienteController::index');
$routes->get('/clientes/registrar', 'ClienteController::registrar');
//$routes->get('/clientes/editar', 'ClienteController::editar');

$routes->get('/clientes/editar/(:num)', 'ClienteController::editar/$1');
$routes->get('/clientes/eliminar/(:num)', 'ClienteController::eliminar/$1');

$routes->post('/clientes/guardar', 'ClienteController::guardar');
$routes->post('/clientes/actualizar', 'ClienteController::actualizar');


// RUTAS DE PROVEDDORES

//listar
$routes->get('/proveedores', 'ProveedorController::index');
//vista de registrar
$routes->get('/proveedores/create', 'ProveedorController::create');
//guardar en la db
$routes->post('/proveedores/save', 'ProveedorController::save');
//eliminar por id
$routes->get('/proveedores/delete/(:num)', 'ProveedorController::delete/$1');
//vista de editar
$routes->get('/proveedores/edit/(:num)', 'ProveedorController::edit/$1');
//actualizar (al editar)
$routes->post('/proveedores/update', 'ProveedorController::update');

// RUTAS DE PRODUCTOS

//listar
$routes->get('/productos', 'ProductoController::index');
//vista / registro 
$routes->get('/productos/create', 'ProductoController::create');
$routes->post('/productos/save', 'ProductoController::save');
//vista / actualizar
$routes->get('/productos/edit/(:num)', 'ProductoController::edit/$1');
$routes->post('/productos/update', 'ProductoController::update');
//eliminar por id
$routes->get('/productos/delete/(:num)', 'ProductoController::delete/$1');


// RUTAS DE VENTAS

//listar
$routes->get('/ventas', 'VentaController::index');
//Vista de registrar
$routes->get('/ventas/create', 'VentaController::create');
$routes->post('/ventas/save', 'VentaController::save');
//Eliminar por id
$routes->get('/ventas/delete/(:num)', 'VentaController::delete/$1');
//Vista de editar
$routes->get('/ventas/edit/(:num)', 'VentaController::edit/$1');
$routes->post('/ventas/update','VentaController::update');