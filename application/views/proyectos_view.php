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
                        <div class="card-body">
                            <div class="row"><!--<div class="row justify-content-center">-->
                                <div class="col-12 bg-danger">
                                    <h3 class="text-dark">Bienvenido usuario</h3>
                                </div>
                                <div class="col-12 mt-2">
                                    <a href="<?= site_url('proyectos/crear_pagina'); ?>" class="btn btn-primary float-end">Nuevo</a>
                                </div>
                                <div class="col-12">
                                    <div class="row mt-2 justify-content-center">
                                        <div class="col-5 bg-warning p-2">
                                            <h1>Proyectos activos</h1>
                                            <?php foreach($registros as $reg){ ?>
                                                <div class="card p-2 <?= $reg->color; ?> mt-2">
                                                    <img src="" alt="<?= $reg->icono; ?>" width="50" height="50">
                                                    <h3 class="text-white"><?= $reg->titulo; ?></h3>
                                                    <p class="text-white">Numero de colaboradores: 1</p>
                                                    <p class="text-white">Publicado el: <?= $reg->fecha_reg; ?></p>
                                                    <a href="<?= site_url('proyecto_tarea'); ?>" class="btn btn-info">Entrar al proyecto</a>
                                                </div>
                                            <?php } ?>
                                            <!--<div class="card p-2 bg-success mt-2">
                                                <img src="" alt="no image" width="50" height="50">
                                                <h3 class="text-white">Titulo</h3>
                                                <p class="text-white">Numero de colaboradores: 3</p>
                                                <p class="text-white">Publicado el: 04-03-2022</p>
                                                <a href="<?= site_url('proyecto_tarea'); ?>" class="btn btn-primary">Entrar al proyecto</a>
                                            </div>
                                            <div class="card p-2 bg-danger mt-2">
                                                <img src="" alt="no image" width="50" height="50">
                                                <h3 class="text-white">Titulo 2</h3>
                                                <p class="text-white">Numero de colaboradores: 7</p>
                                                <p class="text-white">Publicado el: 04-03-2022</p>
                                                <a href="<?= site_url('proyecto_tarea'); ?>" class="btn btn-primary">Entrar al proyecto</a>
                                            </div>-->
                                        </div>
                                        <div class="col-2"></div>
                                        <div class="col-5 bg-warning p-2">
                                            <h1>Proyectos terminados</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>