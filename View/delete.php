<?php
include_once('../srv/config.php');

if (isset($_POST['produk_del'])) {
    delete_produk();
}

if (isset($_POST['user_del'])) {
    delete_user();
}

if (isset($_POST['kategori_del'])) {
    delete_kategori();
}

if (isset($_POST['post_del'])) {
    delete_post();
}
