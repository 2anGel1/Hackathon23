<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;

    public $guarded = [] ;

    protected $fillable = [
        'libelle',
        'quiz_available',
        'video_url'
    ];

    public function classes()
    {
    	return $this->hasMany(Classe::class);
    }

    public function equipes()
    {
    	return $this->hasMany(Equipe::class);
    }

    public function quiz(){
        return $this->hasOne(Quiz::class);
    }

    public function qvideo(){
        return $this->hasOne(Qvideo::class);
    }
}
