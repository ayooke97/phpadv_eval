<article class="col-8 p-3 my-4 rounded-4 border border-2">
    <?php if (isset($_SESSION['user'])) : ?>
        <?php if ($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'editor') : ?>
            <a href="main_<?= $_SESSION['user']['role'] ?>.php" class="btn btn-primary">Menu <?= ucfirst($_SESSION['user']['role']) ?></a>
        <?php endif ?>
    <?php endif ?>
    <header>
        <h2><?= $show['judul'] ?></h2>
        <p>Ditulis oleh : Manusia <sub><?= $show['tanggalDibuat'] ?><sub></p>
    </header>
    <p class="fw-bold">Penjelasan singkat</p>
    <section class="text-break text-justify">
        <p><?= $show['isi'] ?></p>
    </section>
    <section>
        <h2>Produk Kami</h2>
        <div class="row g-0 border border-2 py-5">
            <div class="col-3 border border-2 text-center">
                <div class="card">
                    <div class="card-body">
                        <div class="col">
                            <img src="" alt="test" srcset="">
                            <div class="col">
                                <div>Nama Jamu</div>
                                <div>Khasiat</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-3 border border-2 text-center">
                <div class="card">
                    <div class="card-body">
                        <div class="col">
                            <img src="" alt="test" srcset="">
                            <div class="col">
                                <div>Nama Jamu</div>
                                <div>Khasiat</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-3 border border-2 text-center">
                <div class="card">
                    <div class="card-body">
                        <div class="col">
                            <img src="" alt="test" srcset="">
                            <div class="col">
                                <div>Nama Jamu</div>
                                <div>Khasiat</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-3 border border-2 text-center">
                <div class="card">
                    <div class="card-body">
                        <div class="col">
                            <img src="" alt="test" srcset="">
                            <div class="col">
                                <div class="fw-bold">Nama Jamu</div>
                                <div>Khasiat</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <h2>Rekomendasi Jamu</h2>
        <div class="row">
            <div class="col-7">
                <?php include_once 'rekomjamu.php'; ?>
            </div>
            <div class="col-5">
                <?php if (isset($_POST['rekomjamu'])) :
                    include_once '../jamu.php'; ?>
                    <img src="" alt="gambarjamu" srcset="">
                    <p>Nama : <?= $_POST['nama'] ?></p>
                    <p>Umur : <?= $saran->umur($_POST['tgl_lahir']) ?> tahun</p>
                    <p>Jamu rekomendasi : <?= $saran->namaJamu($_POST['keluhan1'], $_POST['keluhan2']) ?></p>
                    <?= $saran->Saran() ?>

                <?php endif; ?>
            </div>
        </div>
    </section>
</article>