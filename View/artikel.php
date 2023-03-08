<article class="col-8 p-3 my-4 rounded-4 border border-2">
    <?php if (isset($_SESSION['user'])) : ?>
        <?php if ($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'editor') : ?>
            <a href="admin.php" class="btn btn-primary">Menu <?= ucfirst($_SESSION['user']['role']) ?></a>
        <?php endif ?>
    <?php endif ?>
    <header>
        <h2><?= isset($_GET['id']) ? $show['judul'] : "Judul" ?></h2>
        <p>Ditulis oleh : Manusia <sub><?= ($_SERVER['HTTP_REFERER'] == "http://localhost/phpadv_eval/View/blogmenu.php") ? $show['tanggalDibuat'] : date("d-M-Y") ?><sub></p>
    </header>
    <p class="fw-bold">Penjelasan singkat</p>
    <section class="text-break text-justify">
        <p><?= isset($_GET['id']) ? $show['isi'] : "Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores earum doloribus ipsum sint quibusdam? Inventore consequatur, itaque, dicta quibusdam praesentium ea soluta nam, ipsam debitis voluptatem aut dolorum aperiam fugit ratione aspernatur voluptatibus cupiditate voluptate eos. Deleniti sunt autem suscipit illo quia earum eligendi tempora, numquam doloremque fuga nisi? Distinctio asperiores mollitia dicta ea? Dicta eveniet omnis deserunt architecto, possimus harum aut nemo veritatis totam quaerat eaque laboriosam illo alias explicabo in expedita ut molestias repellendus, repudiandae beatae? Quod veritatis adipisci explicabo temporibus, nostrum voluptatem repudiandae consequatur expedita autem consequuntur. Expedita earum laborum saepe tenetur. Nisi repellendus dolorum, ex eius nam adipisci repellat! In, ut. Numquam perferendis eligendi error nulla nesciunt illo commodi praesentium nemo iusto quia aperiam sed accusantium, dolorum exercitationem. Voluptatum aliquid amet quas id. Ea placeat, quibusdam, quo ut nihil est eaque dolor quaerat distinctio ipsa temporibus vel quas repudiandae quos illo vitae accusantium nulla neque necessitatibus cupiditate, qui aliquid. Necessitatibus voluptatibus explicabo veniam odio voluptate deleniti dolore architecto quae eum ducimus. Ratione quidem sequi excepturi! Pariatur beatae dolorum obcaecati nisi veniam reprehenderit molestiae aut asperiores nihil perferendis omnis sint, voluptas illo, similique vitae, nemo fugit? Aspernatur eveniet beatae, magni architecto dignissimos expedita eos. Eius, saepe sed!" ?></p>
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