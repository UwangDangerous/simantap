<div class="row">
    <div class="col-lg-8 " id="login-form-kiri">
        <img src="<?= base_url();?>assets/img/bg_pppomn.jpg" alt="">
        <div id="text-login">
            <h1>BPOM</h1>
            <h6>SIMANTAP BMN</h6>
        </div>
    </div>
    <div class="col-lg-4">
        <div id="form-login"> 
            <div class='text-center'>
                <img src="<?= base_url();?>assets/img/logo.png" alt=""> <br>
                <br>

                <h5>Silahkan Login</h5>
            </div>

            <div class="container">
                <?php if(!empty($this->session->flashdata('login') )) : ?>
                    
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?=  $this->session->flashdata('login'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <br>
                <?php endif ; ?>
                
                <form action="" method="post">
                    <label for="username">Username / Email</label>
                    <input type="text" name="username" id="username" class='form-control col-form-label-sm' placeholder="Username / Email" autocomplete='off'>
                    <small id="usernameHelp" class="form-text text-danger"><?= form_error('username'); ?></small>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class='form-control col-form-label-sm' placeholder="Password">
                    <small id="usernameHelp" class="form-text text-danger"><?= form_error('password'); ?></small>
                    <br>
                    <button class="btn btn-primary" type='submit'> login </button>
                </form>
            </div>
            <br>
            <div class="bottomright">Manual Book</div>
        </div>
    </div>
</div>