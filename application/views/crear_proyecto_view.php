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
                            <form class="row g-3" action="<?= site_url('proyectos/registrar'); ?>" method="post">
                                <input type="hidden" name="fk_usuario" value="<?= $this->session->userdata('app_sess')['_email']; ?>">
                                <div class="col-3">
                                    <?php 
                                        $invalid = "";
                                        if(@$this->session->flashdata('errores')['titulo'])
                                        {
                                            $invalid = "is-invalid";
                                        }
                                    ?>
                                    <label for="titulo" class="form-label">Titulo</label>
                                    <input type="text" class="form-control <?= $invalid; ?>" id="titulo" name="titulo">
                                    <?php if(@$this->session->flashdata('errores')['titulo']){ ?>
                                        <div class="invalid-feedback">
                                            <?=$this->session->flashdata('errores')['titulo'];?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="col-9">
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
                                <div class="col-3">
                                    <?php 
                                        $invalid = "";
                                        if(@$this->session->flashdata('errores')['icono'])
                                        {
                                            $invalid = "is-invalid";
                                        }
                                    ?>
                                    <label for="icono" class="form-label">Icono</label>
                                    <input type="text" class="form-control  <?= $invalid; ?>" id="icono" name="icono">
                                    <?php if(@$this->session->flashdata('errores')['icono']){ ?>
                                        <div class="invalid-feedback">
                                            <?=$this->session->flashdata('errores')['icono'];?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="col-3">
                                    <?php 
                                        $invalid = "";
                                        if(@$this->session->flashdata('errores')['color'])
                                        {
                                            $invalid = "is-invalid";
                                        }
                                    ?>
                                    <label for="color" class="form-label">Color</label>
                                    <select name="color" id="color" class="form-select <?= $invalid; ?>">
                                        <option value="" selected disabled>Selecciona una opción</option>
                                        <option value="bg-primary" class="bg-primary">Azul</option>
                                        <option value="bg-secondary" class="bg-secondary">Gris</option>
                                        <option value="bg-success" class="bg-success">Verde</option>
                                        <option value="bg-danger" class="bg-danger">Rojo</option>
                                        <option value="bg-warning" class="bg-warning">Amarillo</option>
                                        <option value="bg-dark" class="bg-dark text-light">Negro</option>
                                        <option value="bg-light" class="bg-light">Blanco</option>
                                    </select>
                                    <?php if(@$this->session->flashdata('errores')['color']){ ?>
                                        <div class="invalid-feedback">
                                            <?=$this->session->flashdata('errores')['color'];?>
                                        </div>
                                    <?php } ?>
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