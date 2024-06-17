<?php
$name = "Luber";
$idDev = true;
$age = 24;
$newAge = $age . '1';

is_string($name);
is_int($age);
is_bool($isDev);

define('LOGO_URL', 'https://www.php.net/images/logos/new-php-logo.svg');
const NOMBRE = "LUBER";

$outputAge = match (true) {
    $age < 2 => "Eres un bebe, $name ",
    $age < 10 => "Eres un niño, $name ",
    $age < 18 => "Eres un adolescente, $name ",
    $age === 18 => "Eres mayor de edad, $name ",
    $age < 40 => "Eres un adulto joven, $name ",
    $age >= 40 => "Eres un adulto viejo, $name ",
    default => "Hueles mas a madera que a fruta, $name"
}
?>

<?php
$bestLanguages = ["PHP", "javascript", "Python"];
// Lo colocal al final l array sin ningun metodo
$bestLanguages[] = "Typescript";

$person = [
    "name" => "Luber",
    "age" => 24,
    "isDev" => true,
    "Languages" => $bestLanguages
]
?>

<img src=<?= LOGO_URL ?> alt="PHP" width="200" />

<h1>
    <?= $newAge ?>
</h1>

<h2>
    <?= NOMBRE ?>
</h2>

<p>
    <?= $outputAge ?>
</p>

<ul>
    <?php foreach ($bestLanguages as $key => $languages) : ?>
        <li> <?= $key . " " . $languages ?> </li>
    <?php endforeach; ?>
</ul>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }
</style>