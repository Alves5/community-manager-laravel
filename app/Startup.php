<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
    protected $fillable = ['id','nome','email','senha'];

    public function getId(){return $this->id;}
    public function getNome(){return $this->nome;}
    public function getEmail(){return $this->email;}
    public function getSenha(){return $this->senha;}
}
