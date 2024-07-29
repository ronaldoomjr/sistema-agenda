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
            } else {
                return redirect()->back()->with('error', 'Login ou senha incorretos.');
            }
        }

        return view('usuarios/login');
    }

    public function cadastro() {
        helper(['form']);
    
        // Inicializa o serviço de validação e define as regras
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
    
        // Verifica se o formulário foi enviado via POST e se os dados são válidos
        if ($this->request->getMethod() == 'post' && $validation->withRequest($this->request)->run()) {
            $login = $this->request->getPost('login');
            $senha = $this->request->getPost('senha');
    
            // Verifica se a senha é uma string antes de hashear
            if (is_string($senha)) {
                $senhaHash = password_hash($senha, PASSWORD_BCRYPT);
    
                // Salva o usuário no banco de dados
                $usuariosModel = new UsuarioModel();
                $usuariosModel->save([
                    'login' => $login,
                    'senha' => $senhaHash
                ]);
    
                // Redireciona para a página de login com uma mensagem de sucesso
                return redirect()->to('/usuarios/login')->with('success', 'Cadastro realizado com sucesso. Você pode agora fazer login.');
            } else {
                return view('usuarios/cadastro', [
                    'validation' => $validation,
                    'error' => 'Ocorreu um erro inesperado. Por favor, tente novamente.'
                ]);
            }
        } else {
            // Exibe o formulário de cadastro com mensagens de validação
            return view('usuarios/cadastro', [
                'validation' => $validation
            ]);
        }
    }
    

    public function logout() {
        session()->destroy();
        return redirect()->to('/usuarios/login');
    }
}
