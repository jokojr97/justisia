<?php $this->load->view('admin/_partial/header'); ?>
    

      <div class="container-fluid bg-white">
        <!-- <?= $this->session->flashdata('message'); ?> -->
        <div class="row" >
          <div class="col-md-12 p-3 ">
            <form action="<?= base_url() ?>admin/users/add" method="POST">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-md-6">
                    <!-- form group -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" value="<?= $user['nama'] ?>">
                        <?= form_error('name', '<small class="text-danger pl-1">', '</small>') ?>
                    </div>
                    <!-- // form-group -->
                    <!-- form-group -->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" value="<?= $user['username'] ?>">
                        <?= form_error('username', '<small class="text-danger pl-1">', '</small>') ?>
                    </div>
                    <!-- // form-group -->
                    <!-- form-group -->
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Your Email" name="email" value="<?= $user['email'] ?>">
                        <?= form_error('email', '<small class="text-danger pl-1">', '</small>') ?>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <!-- // form-group -->
                    <!-- form-group -->
                    <div class="form-group">
                        <label for="sex">Gender</label>
                        <select name="sex" id="sex" class="form-control">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <!-- // form-group -->
                </div>
                <!-- // col -->
                <!-- col -->
                <div class="col-md-6">
                    <!-- form group -->
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control">
                            <option value="1">Admin</option>
                            <option value="2">Users</option>
                        </select>
                    </div>
                    <!-- // form-group -->
                    <!-- form-group -->
                    <div class="form-group">
                        <label for="password1">Password</label>
                        <input type="password" class="form-control" id="password1" name="password1" placeholder="Make New Password"  readonly="on">
                        <input type="checkbox" value="" id="showpwd1" onclick="myFunction()">
                        <label class="form-check-label" for="defaultCheck1" onclick="myFunction()">
                            Show Password
                        </label>
                        <?= form_error('password1', '<small class="text-danger pl-1">', '</small>') ?>
                    </div>
                    <!-- // form-group -->
                    <!-- form-group -->
                    <div class="form-group">
                        <label for="password2">Repeat Password</label>
                        <input type="password" class="form-control" id="password2" placeholder="Repeat Your Password" name="password2" readonly="on">
                        <input type="checkbox" value="" id="showpwd2" onclick="myFunction()">
                        <label class="form-check-label" for="defaultCheck1" onclick="myFunction()">
                            Show Password
                        </label>
                        <?= form_error('password2', '<small class="text-danger pl-1">', '</small>') ?>
                    </div>
                    <!-- // form-group -->
                    <!-- form-check -->
                    <!-- <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
                    <!-- // form-check -->
                    <button type="submit" class="btn btn-primary float-right ml-3">Submit</button>
                    <a href="<?= base_url() ?>admin/users" class="btn btn-default float-right ml-3"> Cancel</a>
                </div>
                <!-- // col -->
                
            </div>
            <!-- // row -->
            </form>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


      </div><!--/. container-fluid -->
    <?php $this->load->view('admin/_partial/footer') ?>
    <script>
        function myFunction() {
        var x = document.getElementById("password1");
        var y = document.getElementById("password2");
        if (x.type === "password" && y.type === "password") {
            x.type = "text";
            y.type = "text";
            document.getElementById("showpwd1").checked = true;
            document.getElementById("showpwd2").checked = true;
        } else {
            x.type = "password";
            y.type = "password";
            document.getElementById("showpwd1").checked = false;
            document.getElementById("showpwd2").checked = false;
        }
        }
    </script>