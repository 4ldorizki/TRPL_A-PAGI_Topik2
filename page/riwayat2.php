<!-- Table with stripped rows -->
<!-- kategori dan search -->

<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">

            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="" method="post">

                            <input type="text" name="keywordd" placeholder="Cari Riwayat">
                            <button type="submit" name="carii" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<!-- Breadcrumb Section Begin -->

<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">


        <div class="col-lg-5 col-md-8">
            <div class="product__discount">
                <div class="section-title product__discount__title">
                    <h2>Riwayat</h2>
                </div>

            </div>
        </div>
        <?php
        include 'config/koneksi.php';
        $id_userr = $_SESSION['login'];

        ?>
        <div class="row" id="card">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr align="center">
                            <th scope="col">No </th>
                            <th scope="col">Nama Daftar Belanja</th>
                            <th scope="col">Tanggal Belanja</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <?php
                    $result = mysqli_query($koneksi, "SELECT * FROM history WHERE id_user = '$id_userr' group by id_history ORDER BY id_history DESC");

                    $no = 1;

                    foreach ($result as $row) {
                        ?>
                        <tr align="center">
                            <th scope="row">
                                <?= $no++ ?>
                            </th>
                            <td>
                                <?= $row['shopping_name'] ?>
                            </td>
                            <td>
                                <?= $row['shopping_date'] ?>
                            </td>
                            <td>
                                <!-- melihat rincian daftar belanja -->
                                <button data-bs-toggle="modal" data-bs-target="#editwyt<?php echo $row['id_history']; ?>"
                                    class=" btn btn-primary"> </i>Lihat</button>
                                |<!-- menampilkan modal validasi delete -->

                                <a data-bs-toggle='modal' data-bs-target='#deleteryt<?= $row['id_history'] ?>'
                                    class='btn btn-danger text-light'>Hapus</a>
                            </td>
                        </tr>
                        <!-- modal hapus -->
                        <div class="example-modal">
                            <div id="deleteryt<?= $row['id_history'] ?>" class="modal fade" role="dialog"
                                style="display:none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Konfirmasi Hapus Data</h3>
                                        </div>
                                        <div class="modal-body">
                                            <h5 align="center">Apakah anda yakin ingin menghapus
                                                riwayat
                                                <strong><span class="grt">
                                                        <?php echo $row['shopping_name']; ?>
                                                    </span></strong> ?
                                            </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button id="nodelete" type="button" class="btn btn-danger pull-left"
                                                data-bs-dismiss="modal">Batal</button>
                                            <a href="?p=hapus_riwayat&id=<?= $row['id_history'] ?>"
                                                class="btn btn-primary">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal hapus selesai -->
                        <?php
                    }
                    ?>

            </div>
            </table>
        </div>
    </div>
    </div>

    </div>
    </div>
    </div>
</section>

<!-- Product Section End -->