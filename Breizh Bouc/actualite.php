<main class="container">
    <div class="row">
        <div class="col-3">
            <!-- <div class="sticky-top">test</div> -->
        </div>
        <div class="col">
            <div>
                <?php
                include __DIR__ . "/components/form-publication.php";
            ?>
            </div>
                <?php
            for ($i = 0; $i < 10; $i++) {
                include __DIR__ . "/components/publication.php";
            }
            ?>
        </div>
    </div>
</main>
