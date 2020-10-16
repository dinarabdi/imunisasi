<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>PUSKESMAS SEHAT BAHAGIA</title>

  <!-- Bootstrap -->
  <link href="<?= base_url('assets/') ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?= base_url('assets/') ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?= base_url('assets/') ?>vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="<?= base_url('assets/') ?>vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?= base_url('assets/') ?>build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
  <div>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form method="post" action="<?= base_url('auth'); ?>">
            <h1>Halaman Login</h1>
            <?= $this->session->flashdata('message'); ?>
            <div>
              <input type="text" class="form-control" placeholder="Username" required="" id="username" name="username" value="<?= set_value('username'); ?>" />
              <?php echo form_error('username', '<div class="text-danger pl-3">', '</div>'); ?>
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" required="" id="password" name="password">
              <?php echo form_error('password', '<div class="text-danger pl-3">', '</div>'); ?>
            </div>
            <div>
              <button class="btn btn-primary submit btn-block" type="submit">Masuk</button>
              <!-- <a class="to_register" href="#">Lupa Password?</a> -->
            </div>

            <div class="clearfix"></div>

            <div class="separator">

              <div class="clearfix"></div>
              <br />

              <div>
                <h1><i class="fa fa-paw"></i> PUSKESMAS SEHAT BAHAGIA</h1>
                <p>©2020 All Rights Reserved. PUSKESMAS SEHAT BAHAGIA. Privacy and Terms</p>
              </div>
            </div>
          </form>
        </section>
      </div>

    </div>
  </div>
</body>

</html>