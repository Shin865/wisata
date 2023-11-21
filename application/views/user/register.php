
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('assets/vendors/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('assets/vendors/nprogress/nprogress.css');?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url('assets/vendors/animate.css/animate.min.css');?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="<?php echo site_url('user/register_aksi');?>" method="post">
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="username" required="required" data-validation-required-message="Please enter your username" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" name="emailaktif" required="required" data-validation-required-message="Please enter your username" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="user_password" required="required" data-validation-required-message="Please enter your username" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="namalengkap" name="user_namalengkap" required="required" data-validation-required-message="Please enter your username" />
              </div>
              <div>
                <input type="date" class="form-control" placeholder="tanggallahir" name="tgllhr" required="required" data-validation-required-message="Please enter your username" />
              </div>
              <br/>
              <div>
                <input type="text" class="form-control" placeholder="alamat" name="alamat" required="required" data-validation-required-message="Please enter your username" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="NoTelvon" name="notlp" required="required" data-validation-required-message="Please enter your username" />
              </div>
              <div>
                <button class="btn btn-default" type="submit">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="<?php echo site_url('user/login');?>" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
