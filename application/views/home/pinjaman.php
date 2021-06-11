<!-- ======= About Lists Section ======= -->
<section class="about-lists">
    <div class="container">
        <div class="row no-gutters">

            <?php $i = 1; ?>
            <?php foreach ($pinjaman as $pjm) : ?>
                <div class="col-lg-6 col-md-6 content-item" data-aos="fade-up">
                    <a href="<?= base_url('Home/pinjamaUMKM/') . $pjm['id_pinjaman']; ?>">
                        <span>0<?= $i++; ?></span>
                        <h4 style="color: black;"><?= $pjm['judul']; ?></h4>
                        <p><?= $pjm['ringkas']; ?></p>
                    </a>
                </div>
            <?php endforeach; ?>

        </div>

    </div>
</section><!-- End About Lists Section -->