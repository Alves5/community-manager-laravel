<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $fillable = ['id','titulo','descricao','paginas'];

    public function getId(){return $this->id;}
    public function getTitulo(){return $this->titulo;}
    public function getDescricao(){return $this->descricao;}
    public function getPaginas(){return $this->paginas;}
}
