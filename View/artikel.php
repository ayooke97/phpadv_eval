<article class="col-8 p-3 rounded-4 border border-2">
    <?php if (isset($_SESSION['user'])) : ?>
        <?php if ($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'editor') : ?>
            <a href="main_<?= $_SESSION['user']['role'] ?>.php" class="btn btn-primary">Menu <?= ucfirst($_SESSION['user']['role']) ?></a>
        <?php elseif ($_SESSION['user']['role'] == 'user') : ?>
            <h1>User</h1>
        <?php endif ?>
    <?php else : ?>
        <h1>LU SIAPA COK?</h1>
    <?php endif ?>
    <header>
        <h2>Judul</h2>
        <p>Ditulis oleh : Manusia <sub>19 Januari 2023<sub></p>
    </header>
    <p class="fw-bold">Penjelasan singkat</p>
    <section class="text-break text-justify">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse consectetur officia fuga non earum dolor harum in vitae consequuntur blanditiis eaque doloribus placeat voluptas velit dolore consequatur magnam ullam possimus nulla, quaerat at accusantium unde obcaecati! Tenetur aliquid omnis eaque voluptates tempora quae error consectetur optio nulla nam iste maxime numquam nobis reiciendis, tempore ipsum earum amet fuga qui sit quibusdam. Cum iusto reiciendis, omnis nulla nostrum minima voluptatum assumenda cupiditate, quae ipsa exercitationem. Fugit, id! Rerum repellendus natus suscipit consequatur similique, doloribus sequi voluptatem nemo. Voluptates distinctio quod cumque voluptas incidunt vero obcaecati totam laboriosam at ea corrupti molestias cupiditate est veniam maiores consequuntur eveniet assumenda ut, tenetur, expedita eius perspiciatis? Unde, veritatis voluptate obcaecati sequi perferendis dolor cupiditate ipsa ipsum? Veniam omnis aperiam iste sapiente accusantium dicta, voluptatum non beatae dolorum tempora a fugiat maiores, dignissimos aliquid sit, mollitia consequatur aliquam sequi atque? Recusandae nulla magni quaerat. Optio provident, deleniti recusandae accusantium, illo dolor voluptates aut labore est incidunt ducimus eaque. Velit quas nam repellat quae eius nostrum ex quia dolor perferendis ipsa, tenetur impedit architecto! Non molestias doloribus at repellendus dolor ut nobis! Adipisci quia illum nam laboriosam vel consequatur ducimus consectetur. Quis fugiat laborum numquam ab. Numquam aliquid molestiae, quasi dolorum voluptas, illum enim sint magnam non blanditiis iure dignissimos eum, explicabo iste quibusdam molestias placeat excepturi ducimus natus sapiente officia animi aspernatur maiores! Nam repudiandae harum ea fugiat sed tenetur a libero quia aspernatur. Unde omnis commodi culpa error temporibus reiciendis pariatur porro, cumque non labore rem quas maiores neque eligendi dolorum vero distinctio fuga ipsam aspernatur recusandae? Pariatur maxime temporibus laboriosam magni fuga, repudiandae nam asperiores rerum praesentium tenetur officia nihil quas aliquid iusto eligendi dolorem impedit tempore esse animi repellendus sunt consectetur tempora harum inventore. Reiciendis similique cumque ea assumenda quis dolor perferendis eum quasi! Quia, accusamus aut vitae ut libero necessitatibus dolor iste corporis corrupti. Voluptas fuga maxime numquam suscipit sed voluptatem similique impedit! Veritatis eos eius, dolorum dicta dolor rerum voluptatem a sint nisi perferendis laboriosam fugiat illo harum natus doloribus ab sed tempora corrupti quisquam totam explicabo maiores deleniti omnis. Distinctio veritatis, dolorum atque illum ipsum harum dicta illo maiores modi aliquam quam consequuntur natus id culpa officiis eius autem, reiciendis ducimus provident sunt similique, praesentium earum perferendis commodi! Harum dolorum, quibusdam labore vel ab laboriosam quia facilis, illo aut itaque laudantium voluptate! Natus numquam, sapiente ab accusamus at alias maxime sed ipsum voluptatem esse explicabo laborum fugiat autem excepturi laboriosam, voluptatum assumenda dolore quia facere harum. Velit explicabo laboriosam tempore? Officia veritatis alias quibusdam accusamus temporibus optio hic deleniti facere necessitatibus, tempore magnam nisi at ullam dolore atque ab minima voluptatibus. Eaque, unde fuga non nesciunt praesentium recusandae iste alias dolorum voluptatem fugiat ipsum quibusdam doloribus iure odit ab. Molestias modi doloribus, quae, eveniet perferendis deserunt exercitationem aliquam nihil quaerat ratione id maiores voluptatum sit ad, labore dolore? Consequatur neque libero cumque atque nihil explicabo alias velit architecto impedit itaque eaque repellat, eligendi quod fugit sit reprehenderit quae magnam?</p>
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
                    <p>Saran : <?= $saran->Saran() ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</article>