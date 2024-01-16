<?php

namespace App\Models;

use CodeIgniter\Model;

class GuerraModel extends Model
{
    protected $table = "guerra";

    public function insertConsequencia($dados)
    {
        try {
            //code...
            $db = \Config\Database::connect();
            if(count($dados) > 0) {
                $consequencia = $dados['consequencia'];
                $query = "INSERT INTO guerra(consequencia) values ('$consequencia');";
                if($db->query($query)) {
                    return true; // caso retorne true, os dados da consequencia foi inserido
                }
                return false; // caso retorne não retorne true, os dados da consequencia não foi inserido
            }
        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }
    }

    public function getConsequencias()
    {
        $db = \Config\Database::connect();
        return $this->findAll();
    }

    public function deleteConsequencia($id)
    {
        $db = \Config\Database::connect();
        $query = "DELETE FROM guerra WHERE id = '$id';";
        return $db->query($query);
    }
}