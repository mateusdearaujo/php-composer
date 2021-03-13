<?php

require 'vendor/autoload.php';
require 'src/Buscador.php';

use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\DomCrawler\Crawler;

try {
    $client = new Client([
        'base_uri' => 'https://www.alura.com.br/',
        'verify' => false
    ]);

    $crawler = new Crawler();

    $buscador = new Buscador($client, $crawler);
    $cursos = $buscador->buscar('/cursos-online-programacao/php');

    foreach ($cursos as $curso) {
        echo $curso . PHP_EOL;
    }

} catch (GuzzleException $e) {
    echo $e->getMessage();
}