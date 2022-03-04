<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet">

    <title>Ejercicio</title>
  </head>
  <body>
      <div class="row justify-content-center">
        <div clas="col-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title bg-warning">login</h4>
                </div>
                <div class="card-body">
                    <?php if(@$this->session->flashdata('logerr')){ ?>
                    <div class="alert alert-danger">
                        <h3>
                            <?= $this->session->flashdata('logerr'); ?>
                        </h3>
                    </div>
                    <?php } ?>
                    <!--inicio formulario-->
                    <form action="<?= site_url('login/acceso'); ?>" method="POST">
                        <?= form_open('login/acceso'); ?>
                        <div class="row">
                            <div class="col-12 form-group">
                                <label for="email">Email:</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="col-12 form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="col-12 form-group">
                                <button type="submit" class="btn btn-primary">Log in</button>
                            </div>
                        </div>
                    </form>
                    <!--fin formulario-->
                </div>
            </div>
            
        </div>
      </div>
      
    <script src="<?= base_url('assets/js/bootstrap.bundle.js'); ?>" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>