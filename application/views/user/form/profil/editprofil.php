
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="<?php echo site_url('admin/edit');?>" method="post">
            <input type="hidden" name="id" value="<?php echo $admin->id_admin;?>">
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $kategori->username;?>" required="required" data-validation-required-message="Please enter your username" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" name="emailaktif" value="<?php echo $kategori->emailaktif;?>" required="required" data-validation-required-message="Please enter your username" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="admin_password" value="<?php echo $kategori->admin_password;?>" required="required" data-validation-required-message="Please enter your username" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="namalengkap" name="admin_namalengkap" value="<?php echo $kategori->admin_namalengkap;?>" required="required" data-validation-required-message="Please enter your username" />
              </div>
              <div>
                <input type="date" class="form-control" placeholder="tanggallahir" name="tgllhr" value="<?php echo $kategori->tgllhr;?>" required="required" data-validation-required-message="Please enter your username" />
              </div>
              <br/>
              <div>
                <input type="text" class="form-control" placeholder="alamat" name="alamat" value="<?php echo $kategori->alamat;?>" required="required" data-validation-required-message="Please enter your username" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="NoTelvon" name="notlp" value="<?php echo $kategori->notlp;?>" required="required" data-validation-required-message="Please enter your username" />
              </div>
              <div>
                <button class="btn btn-default" type="submit">Edit Profil</a>
              </div>
