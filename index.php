<?php
// Definir la URL de la API
const API_URL = "https://www.whenisthenextmcufilm.com/api";

// Inicializar una nueva sesión de cURL
$ch = curl_init(API_URL);

// Deshabilitar la verificación del certificado SSL (no recomendado para producción)
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// Indicar que queremos recibir el resultado de la petición y no mostrarlo en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Ejecutar la petición y guardar el resultado
$result = curl_exec($ch);

// para hacer una peticion GET rapidamente a una api
//  $result = file_get_contents(API_URL);

// Verificar si hay errores en la ejecución de cURL
if (curl_errno($ch)) {
    echo 'Error en cURL: ' . curl_error($ch);
} else {
    // Decodificar el resultado JSON
    $data = json_decode($result, true);

    // Verificar si la decodificación fue exitosa
    if (json_last_error() === JSON_ERROR_NONE) {
        //var_dump($data);
    } else {
        echo 'Error al decodificar JSON: ' . json_last_error_msg();
    }
}

// Cerrar la sesión de cURL
curl_close($ch);
?>

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="La proxima pelicula de marvel" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La proxima pelicula de marvel</title>
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
/>
</head>

<style>
    main {
        text-align: center;
    }
</style>

<main>
    <section>
        <h1>La proxima pelicula de marvel</h1>
        <img src="<?= $data["poster_url"] ?>" alt="<?= $data["title"] ?>" width="300" height="300" />
    </section>

    <hgroup>
        <h3> Se estrena en <?=$data["days_until"] ?> dias</h3> <br />
        <p>Fecha de estreno: <?=$data["release_date"] ?> </p> <br />
        <p>La siguiente es: <b><?=$data["following_production"]["title"] ?></b> </p> <br />
        <img src="<?= $data["following_production"]["poster_url"] ?>" alt="<?= $data["following_production"]["title"] ?>" width="300" height="300" />
    </hgroup>
</main>