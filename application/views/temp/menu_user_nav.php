<?php if($this->session->userdata('kunci') == 1) : ?>
    <a class="dropdown-item dflex justify-content-between" href="<?= base_url(); ?>notifikasi/logout">Notifikasi <span class='badge badge-danger'>2</span></a>
<?php else : ?>
    
<?php endif ; ?>
    <a class="dropdown-item" href="<?= base_url(); ?>login/logout">Logout</a>