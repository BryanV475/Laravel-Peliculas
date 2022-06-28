<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'sexos';

    protected $fillable = ['nombre'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function actores()
    {
        return $this->hasMany('App\Models\Actore', 'sex_id', 'id');
    }
    
}
