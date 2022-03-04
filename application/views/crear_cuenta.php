<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Ejercicio</title>
    <style>
    body {
        background-image: url('https://i.imgur.com/5KjRkhG.png');
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>
  </head>
  <body>
      <div class="container">
          <div class="row mt-2">
            <div class="col-12">
              <div class="card">
                <div class="card-header bg-success">
                  <h5 class="card-title text-white">Registro</h5>
                </div>
                <div class="card-body bg-success">
                  <div class="row justify-content-center">
                    <div class="col-9">
                      <div class="card">
                        <div class="card-body">
                          <form class="row g-3" action="<?= site_url('crear_usuario/registrar'); ?>" method="post">
                            <div class="col-md-12">
                            <?php 
                                $invalid = "";
                                if(@$this->session->flashdata('errores')['nombre_completo'])
                                {
                                    $invalid = "is-invalid";
                                }
                            ?>
                              <label for="nombre_completo" class="form-label">Nombre</label>
                              <input type="text" class="form-control <?= $invalid; ?>" id="nombre_completo" name="nombre_completo">
                            <?php if(@$this->session->flashdata('errores')['nombre_completo']){ ?>
                                <div class="invalid-feedback">
                                    <?=$this->session->flashdata('errores')['nombre_completo'];?>
                                </div>
                            <?php } ?>
                            </div>
                            <div class="col-md-12">
                            <?php 
                                $invalid = "";
                                if(@$this->session->flashdata('errores')['email'])
                                {
                                    $invalid = "is-invalid";
                                }
                            ?>
                              <label for="email" class="form-label">Correo electronico</label>
                              <input type="text" class="form-control <?= $invalid; ?>" id="email" name="email">
                            <?php if(@$this->session->flashdata('errores')['email']){ ?>
                                <div class="invalid-feedback">
                                    <?=$this->session->flashdata('errores')['email'];?>
                                </div>
                            <?php } ?>
                            </div>
                            <div class="col-md-12">
                            <?php 
                                $invalid = "";
                                if(@$this->session->flashdata('errores')['password'])
                                {
                                    $invalid = "is-invalid";
                                }
                            ?>
                              <label for="password" class="form-label">Contraseña</label>
                              <input type="text" class="form-control <?= $invalid; ?>" id="password" name="password">
                            <?php if(@$this->session->flashdata('errores')['password']){ ?>
                                <div class="invalid-feedback">
                                    <?=$this->session->flashdata('errores')['password'];?>
                                </div>
                            <?php } ?>
                            </div>
                            <div class="col-md-12">
                            <?php 
                                $invalid = "";
                                if(@$this->session->flashdata('errores')['confirm_pass'])
                                {
                                    $invalid = "is-invalid";
                                }
                            ?>
                              <label for="confirm_pass" class="form-label">Repetir contraseña</label>
                              <input type="text" class="form-control <?= $invalid; ?>" id="confirm_pass" name="confirm_pass">
                            <?php if(@$this->session->flashdata('errores')['confirm_pass']){ ?>
                                <div class="invalid-feedback">
                                    <?=$this->session->flashdata('errores')['confirm_pass'];?>
                                </div>
                            <?php } ?>
                            </div>
                            <div class="col-md-12">
                            <?php 
                                $invalid = "";
                                if(@$this->session->flashdata('errores')['genero'])
                                {
                                    $invalid = "is-invalid";
                                }
                            ?>
                                <label for="genero" class="form-label">Genero:</label>
                                <select name="genero" id="genero" class="form-select <?= $invalid; ?>">
                                    <option value="" selected disabled>Selecciona una opción</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                    <option value="X">Sin especificar</option>
                                </select>
                            <?php if(@$this->session->flashdata('errores')['genero']){ ?>
                                <div class="invalid-feedback">
                                    <?=$this->session->flashdata('errores')['genero'];?>
                                </div>
                            <?php } ?>
                            </div>
                            <div class="col-md-12">
                            <!--<?php 
                                $invalid = "";
                                if(@$this->session->flashdata('errores')['genero'])
                                {
                                    $invalid = "is-invalid";
                                }
                            ?>-->
                                <label for="foto" class="form-label">Foto:</label>
                                <!--<select name="genero" id="genero" class="form-select <?= $invalid; ?>">
                                    <option value="" selected disabled>Selecciona una opción</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                    <option value="X">Sin especificar</option>
                                </select>-->
                            <!--<?php if(@$this->session->flashdata('errores')['genero']){ ?>
                                <div class="invalid-feedback">
                                    <?=$this->session->flashdata('errores')['genero'];?>
                                </div>
                            <?php } ?>-->
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
              </div>
            </div>
          </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
