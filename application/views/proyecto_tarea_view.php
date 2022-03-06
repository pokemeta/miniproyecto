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
                            <!--espacio del administrador-->
                            <form class="row g-3" action="" method="post">
                                <div class="col-12">
                                    <div class="row mt-2">
                                        <div class="col-4">
                                            <!--<?php 
                                                $invalid = "";
                                                if(@$this->session->flashdata('errores')['titulo'])
                                                {
                                                    $invalid = "is-invalid";
                                                }
                                            ?>-->
                                            <label for="titulo" class="form-label">Usuarios</label>
                                            <input type="text" class="form-control" id="titulo" name="titulo">
                                            <!--<?php if(@$this->session->flashdata('errores')['titulo']){ ?>
                                                <div class="invalid-feedback">
                                                    <?=$this->session->flashdata('errores')['titulo'];?>
                                                </div>
                                            <?php } ?>-->
                                            <button type="submit" class="btn btn-primary mt-5">Agregar</button>
                                        </div>
                                        <div class="col-8">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Nombre</th>
                                                        <th scope="col">Email</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>jwhiqkkhqkwejhjwqk</th>
                                                        <td>test@email.com</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--fin del espacio de administrador-->
                            <div class="col-12 mt-5 row">
                                <div class="col-4 p-2 bg-warning">
                                    <h3 class="">Tareas</h3>
                                    <div class="card mt-2">
                                        <div class="card-header bg-danger">
                                            <h5 class="text-white">Titulo de la tarea</h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="">Asignado a: muro</p>
                                            <p class="">Fecha limite: 04-03-2022</p>
                                            <p class="text-danger">Fecha entregado: 04-03-2022</p>
                                            <a href="<?= site_url('tarea'); ?>" class="btn btn-primary">editar</a>
                                        </div>
                                    </div>
                                    <div class="card mt-2">
                                        <div class="card-header bg-success">
                                            <h5 class="text-white">Titulo de la tarea</h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="">Asignado a: raul</p>
                                            <p class="">Fecha limite: 04-03-2022</p>
                                            <p class="text-danger">Fecha entregado: 04-03-2022</p>
                                            <a href="<?= site_url('tarea'); ?>" class="btn btn-primary">editar</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1"></div>
                                <div class="col-7 p-2 bg-warning">
                                    <form class="row g-3" action="" method="post">
                                        <div class="col-12">
                                            <label for="titulo" class="form-label">Titulo</label>
                                            <input type="text" class="form-control" id="titulo" name="titulo">
                                        </div>
                                        <div class="col-12">
                                            <label for="descripcion" class="form-label">Descripcion</label>
                                            <textarea rows="6" class="form-control" id="descripcion" name="descripcion"></textarea>
                                        </div>
                                        <div class="col-6">
                                            <label for="fc_limite" class="form-label">Fecha de entrega</label>
                                            <input type="text" class="form-control" id="fc_limite" name="fc_limite">
                                        </div>
                                        <div class="col-6">
                                            <label for="fk_usuario" class="form-label">Responsable</label>
                                            <input type="text" class="form-control" id="fk_usuario" name="fk_usuario">
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary float-end">Registrar tarea</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>