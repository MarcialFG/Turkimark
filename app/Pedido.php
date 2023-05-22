<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pedido
 *
 * @property $id
 * @property $usuario_id
 * @property $nombre
 * @property $numero
 * @property $email
 * @property $direccion
 * @property $producto_id
 * @property $precio
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto $producto
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pedido extends Model
{
    
    static $rules = [
		'usuario_id' => 'required',
		'nombre' => 'required',
		'numero' => 'required',
		'email' => 'required',
		'direccion' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['usuario_id','nombre','numero','email','direccion','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Producto', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'usuario_id');
    }
    

}
