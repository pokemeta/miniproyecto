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
                            <?php if($registros['admin']->fk_usuario == $this->session->userdata('app_sess')['_email']){ ?>
                            <form class="row g-3" action="<?= site_url('proyecto_tarea/reg_colaborador?id='.$this->input->get('id')); ?>" method="post">
                                <div class="col-12">
                                    <!--<?php var_dump($registros['usuarios']); ?>-->
                                    <div class="row mt-2">
                                        <div class="col-4">
                                            <!--<?php 
                                                $invalid = "";
                                                if(@$this->session->flashdata('errores')['titulo'])
                                                {
                                                    $invalid = "is-invalid";
                                                }
                                            ?>-->
                                            <label for="fk_usuario" class="form-label">Usuarios</label>
                                            <select name="fk_usuario" id="fk_usuario" class="form-select <?= $invalid; ?>">
                                                <option value="" selected disabled>Selecciona una opción</option>
                                                <?php foreach($registros['usuarios'] as $res){ ?>
                                                <option value="<?= $res->email; ?>"><?= $res->nombre_completo; ?></option>
                                                <?php } ?>
                                            </select>
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
                                                    <?php foreach($registros['usrs'] as $res){ ?>
                                                    <tr>
                                                        <td><?= $res->nombre_completo; ?></td>
                                                        <td><?= $res->email; ?></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php } ?>
                            <!--fin del espacio de administrador-->
                            <div class="col-12 mt-5 row">
                                <div class="col-4 p-2 bg-warning">
                                    <h3 class="">Tareas</h3>
                                    <div class="card mt-2">
                                        <?php if(@$registros['tareas']){ ?>
                                            <?php foreach($registros['tareas'] as $res){ ?>
                                            <?php
                                                if($res->status == 'P')
                                                {
                                                    $style = "bg-danger";
                                                }
                                                else if($res->status == 'T')
                                                {
                                                    $style = "bg-success";
                                                }
                                            ?>
                                            <div class="card-header <?= $style; ?>">
                                                <h5 class="text-white"><?= $res->titulo ?></h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="">Asignado a: <?= $res->fk_usuario ?></p>
                                                <p class="">Fecha limite: <?= $res->fc_limite ?></p>
                                                <p class="text-danger">Fecha entregado: <?= $res->fc_entregado ?></p>
                                                <?php if($res->status == 'P'){ ?>
                                                <a href="<?= site_url('tarea?id='.$res->id.'&&idp='.$this->input->get('id')); ?>" class="btn btn-primary">editar</a>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    <?php }else{ ?>
                                    <div class="card-header bg-dark">
                                                <h5 class="text-white">sin tareas</h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="">Asignado a: ninguno</p>
                                                <p class="">Fecha limite: ninguno</p>
                                                <p class="text-danger">Fecha entregado: ninguno</p>
                                            </div>
                                    <?php } ?>
                                    </div>
                                </div>
                                <div class="col-1"></div>
                                <div class="col-7 p-2 bg-warning">
                                    <form class="row g-3" action="<?= site_url('proyecto_tarea/registrar'); ?>" method="post">
                                        <input type="hidden" name="fk_proyecto" value="<?= $this->input->get('id'); ?>">
                                        <div class="col-12">
                                            <label for="titulo" class="form-label">Titulo</label>
                                            <?php 
                                                $invalid = "";
                                                if(@$this->session->flashdata('errores')['titulo'])
                                                {
                                                    $invalid = "is-invalid";
                                                }
                                            ?>
                                            <input type="text" class="form-control <?= $invalid; ?>" id="titulo" name="titulo">
                                            <?php if(@$this->session->flashdata('errores')['titulo']){ ?>
                                                <div class="invalid-feedback">
                                                    <?=$this->session->flashdata('errores')['titulo'];?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="col-12">
                                            <?php 
                                                $invalid = "";
                                                if(@$this->session->flashdata('errores')['descripcion'])
                                                {
                                                    $invalid = "is-invalid";
                                                }
                                            ?>
                                            <label for="descripcion" class="form-label">Descripcion</label>
                                            <textarea rows="6" class="form-control <?= $invalid; ?>" id="descripcion" name="descripcion"></textarea>
                                            <?php if(@$this->session->flashdata('errores')['descripcion']){ ?>
                                                <div class="invalid-feedback">
                                                    <?=$this->session->flashdata('errores')['descripcion'];?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="col-6">
                                            <?php 
                                                $invalid = "";
                                                if(@$this->session->flashdata('errores')['descripcion'])
                                                {
                                                    $invalid = "is-invalid";
                                                }
                                            ?>
                                            <label for="fc_limite" class="form-label">Fecha de entrega</label>
                                            <input type="date" class="form-control  <?= $invalid; ?>" id="fc_limite" name="fc_limite">
                                            <?php if(@$this->session->flashdata('errores')['fc_limite']){ ?>
                                                <div class="invalid-feedback">
                                                    <?=$this->session->flashdata('errores')['fc_limite'];?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="col-6">
                                            <?php 
                                                $invalid = "";
                                                if(@$this->session->flashdata('errores')['fk_usuario'])
                                                {
                                                    $invalid = "is-invalid";
                                                }
                                            ?>
                                            <label for="fk_usuario" class="form-label">Responsable</label>
                                            <select name="fk_usuario" id="fk_usuario" class="form-select <?= $invalid; ?>">
                                                <option value="" selected disabled>Selecciona una opción</option>
                                                <?php foreach($registros['usrs'] as $res){ ?>
                                                <option value="<?= $res->email; ?>"><?= $res->nombre_completo; ?></option>
                                                <?php } ?>
                                            </select>
                                            <?php if(@$this->session->flashdata('errores')['fk_usuario']){ ?>
                                                <div class="invalid-feedback">
                                                    <?=$this->session->flashdata('errores')['fk_usuario'];?>
                                                </div>
                                            <?php } ?>
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