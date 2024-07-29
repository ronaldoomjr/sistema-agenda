<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Agenda Eletrônica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Editar Atividade</h2>
        <form action="<?= site_url('atividades/' . $atividade['id']) ?>" method="put">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" value="<?= $atividade['nome'] ?>" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" class="form-control"><?= $atividade['descricao'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="data_inicio">Data e Hora de Início</label>
                <input type="datetime-local" name="data_inicio" class="form-control" value="<?= $atividade['data_inicio'] ?>" required>
            </div>
            <div class="form-group">
                <label for="data_termino">Data e Hora de Término</label>
                <input type="datetime-local" name="data_termino" class="form-control" value="<?= $atividade['data_termino'] ?>" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="pendente" <?= $atividade['status'] == 'pendente' ? 'selected' : '' ?>>Pendente</option>
                    <option value="concluída" <?= $atividade['status'] == 'concluída' ? 'selected' : '' ?>>Concluída</option>
                    <option value="cancelada" <?= $atividade['status'] == 'cancelada' ? 'selected' : '' ?>>Cancelada</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</body>
</html>
