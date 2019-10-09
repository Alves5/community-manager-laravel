<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $fillable = ['id','nome','celular'];

    public function getId(){return $this->id;}
    public function getNome(){return $this->nome;}
    public function getCelular(){return $this->celular;}
}
