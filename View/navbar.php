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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./blogmenu.php">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacts</a>
                    </li>
                </div>
                <?php if (isset($_SESSION['user'])) : ?>
                    <form action="" method="post">
                        <button type="submit" class="btn btn-outline-danger" name="logout">Logout</button>
                    </form>
                <?php else : ?>
                    <div class="d-flex gap-2">
                        <a class="btn btn-outline-warning" href="register.php">Sign Up</a>
                        <a class="btn btn-outline-success" href="login.php">Login</a>
                    </div>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>