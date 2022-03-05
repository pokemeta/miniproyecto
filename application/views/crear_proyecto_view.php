<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Ejercicio</title>
    </head>
    <body class="bg-warning">
        <div class="container">
            <div class="row mt-2">
                <div class="col-14">
                    <div class="card">
                        <!--<div class="card-header"><h5 class="card-title text-black">test</h5></div>-->
                        <div class="card-header bg-danger">
                            <a href="<?= site_url('proyectos'); ?>">regresar</a>
                            <h5 class="text-white">crear proyecto</h5>
                        </div>
                        <div class="card-body">
                            <form class="row g-3" action="<!--<?= site_url('alumnos/registrar'); ?>-->" method="post">
                                <div class="col-3">
                                    <label for="titulo" class="form-label">Titulo</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo">
                                </div>
                                <div class="col-9">
                                    <label for="descripcion" class="form-label">Descripcion</label>
                                    <textarea rows="6" class="form-control" id="descripcion" name="titulo"></textarea>
                                </div>
                                <div class="col-3">
                                    <label for="titulo" class="form-label">Icono</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo">
                                </div>
                                <div class="col-3">
                                    <label for="color" class="form-label">Color</label>
                                    <select name="color" id="color" class="form-select">
                                        <option value="" selected disabled>Selecciona una opción</option>
                                        <option value="">Masculino</option>
                                        <option value="">Femenino</option>
                                        <option value="">Sin especificar</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary float-end" type="submit">Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>