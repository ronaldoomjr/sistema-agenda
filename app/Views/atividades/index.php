<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Sistema Agenda Eletrônica</title>
</head>
<body>
<div class="container">
        <h2>Minhas Atividades</h2>
        <a href="<?= site_url('atividades/create') ?>" class="btn btn-primary">Nova Atividade</a>
        <div id="calendar"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                events: <?= json_encode($atividades) ?>
            });
        });
    </script>
</body>
</html>