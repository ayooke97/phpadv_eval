<nav class="navbar navbar-expand-lg bg-success bg-opacity-75">
    <div class="container">
        <a class="navbar-brand text-white" href="#">Wes Makmur</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <div class="d-flex gap-3 me-3">
                    <li class="nav-item">
                        <a class="nav-link <?= ($_SERVER['PHP_SELF'] == "/phpadv_eval/View/main.php") ? "active" : "" ?>" aria-current="page" href="./main.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_SERVER['PHP_SELF'] == "/phpadv_eval/View/blogmenu.php") ? "active" : "" ?>" href="./blogmenu.php">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_SERVER['PHP_SELF'] == "/phpadv_eval/View/contact.php") ? "active" : "" ?>" href="./contact.php">Contacts</a>
                    </li>
                    <?php if (isset($_SESSION['user'])) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $_SESSION['user']['username'] ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="edit.php">Edit</a></li>
                                <form action="" method="post">
                                    <li><button class="dropdown-item" type="submit" name="logout">Logout</button></li>
                                </form>
                            </ul>
                        </li>
                    <?php endif; ?>
                </div>

                <?php if (empty($_SESSION['user'])) : ?>
                    <div class="d-flex gap-2">
                        <a class="btn btn-outline-warning" href="register.php">Sign Up</a>
                        <a class="btn btn-outline-success" href="login.php">Login</a>
                    </div>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>