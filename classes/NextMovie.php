<?php

declare(strict_types=1);

class NextMovie
{
    public function __construct(
        private string $title,
        private int $days_until,
        private string $following_production,
        private string $following_production_poster_url,
        private string $release_date,
        private string $poster_url,
        private string $overview,
    ) {
    }

    public function get_until_message(): string
    {
        $days = $this->days_until;
        return match (true) {
            $days === 0 => "Hoy se estrena",
            $days === 1 => "Mañana se estrena",
            $days < 7 => "Falta una semana para el estreno",
            $days === 30 => "Este mes se estrena",
            default => "$days dias hasta el estreno"
        };
    }

    public static function fetch_and_create_movie(string $url): NextMovie
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

                return new self(
                    $data["title"],
                    $data["days_until"],
                    $data["following_production"]['title'] ?? "Desconocido",
                    $data["following_production"]["poster_url"] ?? "Desconocido",
                    $data["release_date"],
                    $data["poster_url"],
                    $data["overview"],
                );
            } else {
                echo 'Error al decodificar JSON: ' . json_last_error_msg();
            }
        }
        // Cerrar la sesión de cURL
        curl_close($ch);
    }

    public function get_data()
    {
        return get_object_vars($this);
    }
}
