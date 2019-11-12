<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = [
        'id',
        'titulo',
        'evento',
        'mentor',
        'local',
        'descricao',
        'equipamento',
        'color',
        'start_date',
        'end_date',
        'hora_criacao',
        'privado'
    ];

    public function getId(){return $this->id;}
    public function getTitulo(){return $this->titulo;}
    public function getEvento(){return $this->evento;}
    public function getMentor(){return $this->mentor;}
    public function getLocal(){return $this->local;}
    public function getDescricao(){return $this->descricao;}
    public function getEquipamento(){return $this->equipamento;}
    public function getColor(){return $this->color;}
    public function getStart_date(){return $this->start_date;}
    public function getEnd_date(){return $this->end_date;}
    public function getHora_criacao(){return $this->hora_criacao;}
    public function getPrivado(){return $this->privado;}
}
