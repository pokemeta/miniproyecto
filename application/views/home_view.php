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
        <div class="row mt-5">
            <div class="col-12">
            <?php if($this->session->userdata('app_sess')){ ?>
                <h1 class="text-warning">Has iniciado sesion</h1>
                <a href="<?= site_url('login/cerrar_sesion'); ?>">Cerrar sesion</a>
            <?php }else{ ?>
                <h1 class="text-light">No has iniciado sesion</h1>
                <a href="<?= site_url('login'); ?>">Iniciar sesion</a>
                <a href="<?= site_url('crear_usuario'); ?>">Crear cuenta</a>
            </div>
        </div>
      </div>
      <?php } ?>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>