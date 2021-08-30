<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;
use Psy\Command\EditCommand;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get ('/', function(){
    return 'esta es la URL raiz...';
});

Route::get ('/products', function(){
    //$Allproducts = Product::all();
    $Allproducts = Product::orderby('name', 'asc')->get();
    return view('vista.vista', compact('Allproducts'));
})->name('products.list');
Route::get ('/products/create', function(){
    return view('vista.create');
})->name('products.create');
Route::post ('/products', function(Request $request){
    //return $request->all();
    //return 'Producto Guardado !!!';
    $nuevoProducto = new Product;
    $nuevoProducto->name = $request->input('producto');
    $nuevoProducto->description = $request->input('descripcion');
    $nuevoProducto->price = $request->input('valor');
    $nuevoProducto->created_by = 'Admin';
    date_default_timezone_set('America/Bogota');
    $date = date('Y/m/d h:i:s a', time());
    $nuevoProducto->created_at = $date;
    $nuevoProducto->save();
    return redirect()->route('products.list')->with('ok', 'Producto creado exitosamente');
})->name('products.store');

Route::delete('/products/{id}', function($id){
    $Delproduct = Product::findOrFail($id);
    $Delproduct->delete();
    return redirect()->route('products.list')->with('info', 'Producto '.$id.' eliminado exitosamente');
})->name('products.destroy');

Route::get('/products/{id}/edit', function($id){
    $Editproduct = Product::findOrFail($id);
    //return $Editproduct;
    return view('vista.edit', compact('Editproduct'));
    //return redirect()->route('products.edit')->with('info', 'Producto '.$id.' editado exitosamente');
})->name('products.edit');

Route::put('/products/{id}', function(Request $producto, $id){
    $Editproduct = Product::findOrFail($id);
    $Editproduct->name = $producto->input('producto');
    $Editproduct->description = $producto->input('descripcion');
    $Editproduct->price = $producto->input('valor');
    $Editproduct->save();
    return redirect()->route('products.list')->with('ok', 'Producto '.$id.' actualizado exitosamente');
})->name('products.update');