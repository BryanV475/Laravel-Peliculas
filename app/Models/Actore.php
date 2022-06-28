<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actore extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'actores';

    protected $fillable = ['nombre','sex_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function actorpeliculas()
    {
        return $this->hasMany('App\Models\Actorpelicula', 'act_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sexo()
    {
        return $this->hasOne('App\Models\Sexo', 'id', 'sex_id');
    }
    
}
