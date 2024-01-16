<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $guerraModel =  new \App\Models\GuerraModel();
        $getConquencias = $guerraModel->getConsequencias();
        return view('index', ['consequencia' => $getConquencias]);
    }

    public function sendConsequencia()
    {
        $guerraModel =  new \App\Models\GuerraModel();
        
        $resultado = $guerraModel->insertConsequencia($_POST);
        $getConquencias = $guerraModel->getConsequencias();
        
        $session = session();
        if($resultado) {
            $session->setFlashdata(['status' => "sucesso"]);
            return view('index', ['consequencia' => $getConquencias]);
        }
        $session->setFlashdata(['status' => "error"]);
        return view('index', ['consequencia' => $getConquencias]);
    }

    public function deleteConsequencia($id)
    {  
        $guerraModel =  new \App\Models\GuerraModel();
        $resultado = $guerraModel->deleteConsequencia($id);
        $getConquencias = $guerraModel->getConsequencias();
        $session = session();
        if($resultado) {
            $session->setFlashdata(['status' => "delete"]);
            return view('index', ['consequencia' => $getConquencias]);
        }
        $session->setFlashdata(['status' => "notdelete"]);
        return view('index', ['consequencia' => $getConquencias]);
    }
}
