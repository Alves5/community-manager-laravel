<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edital extends Model
{
    protected $fillable = ['id','titulo','descricao','link'];

    public function getId(){return $this->id;}
    public function getTitulo(){return $this->titulo;}
    public function getDescricao(){return $this->descricao;}
    public function getLink(){return $this->link;}
}
