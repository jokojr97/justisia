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
                        <input type="text" class="form-control" id="name" placeholder="Enter Your Name">
                    </div>
                    <!-- // form-group -->
                    <!-- form-group -->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter Username">
                    </div>
                    <!-- // form-group -->
                    <!-- form-group -->
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Your Email">
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
                            <option>Admin</option>
                            <option>Users</option>
                        </select>
                    </div>
                    <!-- // form-group -->
                    <!-- form-group -->
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
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