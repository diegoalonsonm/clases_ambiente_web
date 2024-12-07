<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Reserva aqui tu cita</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div id="response"></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form class="mt-4 card p-3 shadow-lg" name="nuevaCita" id="nuevaCita" method="post">
                    <div class="mb-3">
                        <label for="nombre_dueno" class="form-label">Nombre del dueño</label>
                        <input type="text" class="form-control" id="nombre_dueno" name="nombre_dueno">
                    </div>
                    <div class="mb-3">
                        <label for="nombre_mascota" class="form-label">Nombre de la mascota</label>
                        <input type="text" class="form-control" id="nombre_mascota" name="nombre_mascota">
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha de la cita</label>
                        <input type="date" class="form-control" id="fecha" name="fecha">
                    </div>
                    <div class="mb-3">
                        <label for="hora" class="form-label">Hora de la cita</label>
                        <select class="form-control" id="hora" name="hora">
                            <option value="10:00">10:00 AM</option>
                            <option value="10:30">10:30 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="11:30">11:30 AM</option>
                            <option value="12:00">12:00 PM</option>
                            <option value="12:30">12:30 PM</option>
                            <option value="13:00">1:00 PM</option>
                            <option value="13:30">1:30 PM</option>
                            <option value="14:00">2:00 PM</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Rservar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $('#nuevaCita').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData($('#nuevaCita')[0]);
                $.ajax({
                    url: '../controller/citasController.php?op=insertarCita', // Ruta del controlador PHP
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#response').html('<div class="alert alert-success">Cita programada exitosamente!</div>')
                    },
                    error: function(err) {
                        $('#response').html('<div class="alert alert-danger">Error al programar la cita.</div>')
                    }
                })
            })
        })
    </script>
</body>
</html>