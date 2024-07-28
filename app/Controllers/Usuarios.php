<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class UsuariosController extends Controller
{
    public function login() {
        if ($this->request->getMethod() == 'post') {
            $login = $this->request->getPost('login');
            $senha = $this->request->getPost('senha');
            
            $model = new UsuarioModel();
            $usuario = $model->autenticar($login, $senha);
            
            if ($usuario) {
                session()->set('usuario_id', $usuario->id);
                return redirect()->to('/atividades');
            } else {
                return redirect()->back()->with('error', 'Login ou senha incorretos.');
            }
        }

        return view('usuarios/login');
    }

    public function cadastro() {
        if ($this->request->getMethod() == 'post') {
            $model = new UsuarioModel();
            $data = [
                'login' => $this->request->getPost('login'),
                'senha' => $this->request->getPost('senha')
            ];
            
            $model->insert($data);
            return redirect()->to('/usuarios/login');
        }

        return view('usuarios/cadastro');
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/usuarios/login');
    }
}
