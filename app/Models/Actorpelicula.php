<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actorpelicula extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'actorpeliculas';

    protected $fillable = ['act_id','pel_id','papel'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function actore()
    {
        return $this->hasOne('App\Models\Actore', 'id', 'act_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pelicula()
    {
        return $this->hasOne('App\Models\Pelicula', 'id', 'pel_id');
    }
    
}
