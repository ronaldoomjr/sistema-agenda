<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AtividadeModel;

class Atividades extends Controller
{
    public function index()
    {
        $model = new AtividadeModel();
        $usuario_id = session()->get('usuario_id');
        $atividades = $model->where('usuario_id', $usuario_id)->findAll();

        return view('atividades/index', ['atividades' => $atividades]);
    }

    public function create() {
        if ($this->request->getMethod() == 'post') {
            $model = new AtividadeModel();
            $data = [
                'usuario_id' => session()->get('usuario_id'),
                'nome' => $this->request->getPost('nome'),
                'descricao' => $this->request->getPost('descricao'),
                'data_inicio' => $this->request->getPost('data_inicio'),
                'data_termino' => $this->request->getPost('data_termino'),
                'status' => 'pendente',
            ];

            $model->insert($data);
            return redirect()->to('/atividades');
        }

        return view('atividades/create');
    }

    public function edit($id) {
        $model = new AtividadeModel();

        if ($this->request->getMethod() == 'post') {
            $data = [
                'nome' => $this->request->getPost('nome'),
                'descricao' => $this->request->getPost('descricao'),
                'data_inicio' => $this->request->getPost('data_inicio'),
                'data_termino' => $this->request->getPost('data_termino'),
                'status' => $this->request->getPost('status'),
            ];

            $model->update($id, $data);
            return redirect()->to('/atividades');
        }

        $atividade = $model->find($id);
        return view('atividades/edit', ['atividade' => $atividade]);
    }

    public function delete($id) {
        $model = new AtividadeModel();
        $model->delete($id);

        return redirect()->to('/atividades');
    }
}
