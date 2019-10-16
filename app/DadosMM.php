<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DadosMM extends Model
{
    protected $fillable = [
        'id',
        'foto',
        'nome',
        'dataNasc',
        'especializacao',
        'telefone',
        'endereco',
        'redesSociais',
        'sobre'];

    public function getId(){return $this->id;}
    public function getFoto(){return $this->foto;}
    public function getNome(){return $this->nome;}
    public function getDataNasc(){return $this->dataNasc;}
    public function getEspecializacao(){return $this->especializacao;}
    public function getTelefone(){return $this->telefone;}
    public function getEndereco(){return $this->endereco;}
    public function getRedesSociais(){return $this->redesSociais;}
    public function getSobre(){return $this->sobre;}
}
