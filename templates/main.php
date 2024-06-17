<main>
    <section>
        <h1>La proxima pelicula de marvel</h1>
        <img src="<?= $poster_url ?>" alt="<?= $title ?>" width="300" height="300" />
    </section>

    <hgroup>
        <h3><?= $title ?> - <?= $until_message ?> </h3> <br />
        <p>Fecha de estreno: <?= $release_date ?> </p> <br />
        <p>La siguiente es: <b><?= $following_production ?></b> </p> <br />
        <img src="<?= $following_production_poster_url ?>" alt="<?= $following_production?>" width="300" height="300" />
    </hgroup>
</main>