<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CarritoProducto
 *
 * @property $id
 * @property $carrito_id
 * @property $producto_id
 * @property $precio
 * @property $cantidad
 * @property $created_at
 * @property $updated_at
 *
 * @property Carrito $carrito
 * @property Producto $producto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CarritoProducto extends Model
{
    
    static $rules = [
		'carrito_id' => 'required',
		'producto_id' => 'required',
		'precio' => 'required',
		'cantidad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['carrito_id','producto_id','precio','cantidad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function carrito()
    {
        return $this->hasOne('App\Carrito', 'id', 'carrito_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Producto', 'id', 'producto_id');
    }
    

}
