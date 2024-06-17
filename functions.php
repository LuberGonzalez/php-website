<?php
// para poder hacer tipos y poder hacer mas estricto el codigo.
declare(strict_types=1);

function get_data(string $url): array
{
    // Inicializar una nueva sesión de cURL
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Error en cURL: ' . curl_error($ch);
    } else {

        $data = json_decode($result, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            return $data;
        } else {
            echo 'Error al decodificar JSON: ' . json_last_error_msg();
        }
    }
    // Cerrar la sesión de cURL
    curl_close($ch);
}

function render_template(string $template, array $data = [])
{
    extract($data);

    require "templates/$template.php";
}
