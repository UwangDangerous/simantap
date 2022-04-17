
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <link rel="stylesheet" href="<?=base_url(); ?>assets/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/fontAwesome/css/all.css">
        <link rel="stylesheet" href="<?= base_url();?>assets/css/dataTables.bootstrap4.min.css">
        
        <link rel="stylesheet" href="<?=base_url(); ?>assets/css/mystyle.css">
        <link rel="stylesheet" href="<?=base_url(); ?>assets/css/navbar.css">

        <title><?= $judul ; ?></title>
        <link rel="icon" href="<?= base_url();?>assets/img/logo-bpom.png">
        
        <script src="<?= base_url(); ?>assets/js/jquery.js" ></script>
        
        <script src="<?= base_url(); ?>assets/js/dataTables.js" ></script>
        <script src="<?= base_url(); ?>assets/js/dataTables.bootstrap4.min.js" ></script>


    </head> 
    <body>
    
        <nav class="navbar navbar-expand-md fixed-top navbar-dark my-bg-navbar p-2">
            <!-- <div class="container"> -->
                <a class="navbar-brand" href="<?= base_url(); ?>">DINAS</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href='<?= base_url(); ?>' class="nav-link" >Home</a>
                        </li>
                        <li class="nav-item">
                            <a href='#login'  data-toggle="modal" data-target="#masuk" data-toggle='tooltip' title='Login Admin' class="nav-link" id="login">Login</a>
                        </li>
                        <li class="nav-item">
                             | 
                        </li>
                        <li class="nav-item">
                            <a href='<?= base_url(); ?>Perjalanan' class="nav-link" > Perjalanan Dinas </a>
                        </li>
                    </ul>
                </div>
            <!-- </div> -->
        </nav>

        <!-- Modal -->
        <div class="modal fade" id="masuk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method='post'>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"> <i class="fa fa-user-tie"></i> </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Username">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input type="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
        </div>       
        <div class="p-3">
            <section>










