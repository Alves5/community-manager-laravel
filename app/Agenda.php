<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = ['id','titulo','color','start_date','end_date'];

    public function getId(){return $this->id;}
    public function getTitulo(){return $this->titulo;}
    public function getColor(){return $this->color;}
    public function getStart_date(){return $this->start_date;}
    public function getEnd_date(){return $this->end_date;}
}
