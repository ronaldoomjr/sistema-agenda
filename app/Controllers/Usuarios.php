<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;
class Usuarios extends Controller
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
            } 
            
            return redirect()->back()->with('error', 'Login ou senha incorretos.');
            
        }

        return view('usuarios/login');
    }

    public function cadastro() {
        helper(['form']);
    
        $validation = \Config\Services::validation();
        $validation->setRules([
            'login' => [
                'label' => 'Login',
                'rules' => 'required|min_length[3]|max_length[255]|is_unique[usuarios.login]',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório.',
                    'min_length' => 'O campo {field} deve ter pelo menos {param} caracteres.',
                    'max_length' => 'O campo {field} não pode exceder {param} caracteres.',
                    'is_unique' => 'O {field} informado já está em uso.'
                ]
            ],
            'senha' => [
                'label' => 'Senha',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório.',
                    'min_length' => 'O campo {field} deve ter pelo menos {param} caracteres.'
                ]
            ]
        ]);
    
        if ($this->request->getMethod() == 'post' && $validation->withRequest($this->request)->run()) {
            $login = $this->request->getPost('login');
            $senha = $this->request->getPost('senha');
    
            if (is_string($senha)) {
                $senhaHash = password_hash($senha, PASSWORD_BCRYPT);
    
                $usuariosModel = new UsuarioModel();
                $usuariosModel->save([
                    'login' => $login,
                    'senha' => $senhaHash
                ]);
    
                return redirect()->to('/usuarios/login')->with('success', 'Cadastro realizado com sucesso. Você pode agora fazer login.');
            } 

            return view('usuarios/cadastro', [
                'validation' => $validation,
                'error' => 'Ocorreu um erro inesperado. Por favor, tente novamente.'
            ]);
            
        } 
        
        return view('usuarios/cadastro', [
            'validation' => $validation
        ]);
        
    }
    

    public function logout() {
        session()->destroy();
        return redirect()->to('/usuarios/login');
    }
}
