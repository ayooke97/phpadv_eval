<?php
if ($_SESSION['user']['role'] != 'admin') {
    echo '<p style="padding-inline: 1.5rem;">Halaman ini hanya dapat diakses oleh admin.</p>';
}

if ($_SESSION['user']['role'] != 'admin' && $_SESSION['user']['role'] != 'editor') {
    echo '<p style="padding-inline: 1.5rem;">Halaman ini hanya dapat diakses oleh admin dan editor.</p>';
}
