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
                            <a href="<?= site_url('proyecto_tarea'); ?>">regresar</a>
                            <h5 class="text-white">Editar tarea</h5>
                        </div>
                        <div class="card-body">
                            <form class="row g-3" action="" method="post">
                                <input type="hidden" name="id" value="<?= $this->input->get('id'); ?>">
                                <div class="col-12">
                                    <a href="" class="btn btn-success float-end">Marcar como terminado</a>
                                    <a href="" class="btn btn-danger float-end">borrar</a>
                                </div>
                                <div class="col-3">
                                    <?php 
                                        $invalid = "";
                                        if(@$this->session->flashdata('errores')['titulo'])
                                        {
                                            $invalid = "is-invalid";
                                        }
                                    ?>
                                    <label for="titulo" class="form-label">Titulo</label>
                                    <input type="text" class="form-control <?= $invalid; ?>" id="titulo" name="titulo" value="<?= $dt['datos']->titulo; ?>">
                                    <?php if(@$this->session->flashdata('errores')['titulo']){ ?>
                                        <div class="invalid-feedback">
                                            <?=$this->session->flashdata('errores')['titulo'];?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="col-9">
                                    <label for="descripcion" class="form-label">Descripcion</label>
                                    <textarea rows="6" class="form-control" id="descripcion" name="titulo"><?= $dt['datos']->descripcion; ?></textarea>
                                </div>
                                <div class="col-3">
                                    <label for="fc_limite" class="form-label">Fecha limite</label>
                                    <input type="text" class="form-control" id="fc_limite" name="fc_limite" value="<?= $dt['datos']->fc_limite; ?>">
                                </div>
                                <div class="col-3">
                                    <label for="fk_usuario" class="form-label">Responsable</label>
                                    <select name="fk_usuario" id="fk_usuario" class="form-select <?= $invalid; ?>">
                                        <option value="" selected disabled>Selecciona una opción</option>
                                        <?php foreach($dt['usrs'] as $res){ ?>
                                        <option value="<?= $res->email; ?>"  <?= $dt['datos']->fk_usuario == $res->email ? 'selected' : ''; ?>><?= $res->nombre_completo; ?></option>
                                        <?php } ?>
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