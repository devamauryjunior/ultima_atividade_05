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

    public function screenEditar($id)
    {
        $guerraModel =  new \App\Models\GuerraModel();
        $resultado = $guerraModel->getOneConsequencia($id);
        // var_dump($resultado);
        return view('/editar', ['resultado' => $resultado]);
    }

    public function atualizarConsequencia()
    {
        $guerraModel =  new \App\Models\GuerraModel();
        $resultado = $guerraModel->atualizarConsequencia($_POST);
        // var_dump($resultado);
        if($resultado) {
            return redirect('/');
        }
        // $session
        return view('/');
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
