<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
    protected $fillable = ['id','nome','email','senha','ativo'];

    public function getId(){return $this->id;}
    public function getNome(){return $this->nome;}
    public function getEmail(){return $this->email;}
    public function getSenha(){return $this->senha;}
    public function getAtivo(){return $this->ativo;}
}
