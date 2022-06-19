<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Login</title>
    <style type="text/css">
        .bg-login{
            background-image: url(<?php echo base_url("assets/template/css/bg.jpg");?>);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100%;
        }
    </style>
  </head>
  <body class="bg-login">
    
    <div class="row" style="margin-top:150px">
      <div class="col-md-4 offset-md-4">
      <div class="card card-primary">
        <div class="card-header">
          <b><center>LOGIN</center></b>
        </div>
        <div class="card-body">
          <form method="post" action="<?= base_url('login/login_aksi');?>">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control" autocomplete="off">
              <small><span class="text-danger"><?= form_error('username'); ?></span></small>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" autocomplete="off">
              <small><span class="text-danger"><?= form_error('password'); ?></span></small>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
        </div>
      </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
 <!--  <footer class="main-footer">
    <div class="float-right d-none d-sm-block" style="padding-bottom: ;">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2021-2022 <a href="http://adminlte.io">Yuli Prasetyo</a>.</strong>
  </footer> -->
</html>