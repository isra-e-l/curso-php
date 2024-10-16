<?php
    const API_URL = "https://whenisthenextmcufilm.com/api";
    #Inicializar una nueva secion de cURL; ch= cURL handle
    $ch = curl_init(API_URL);
    //Indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    /*Ejecutar la peticion
    y guardadamos el resultado
    */
    $result = curl_exec($ch);
    // una alternativa seria utilizar file_get_contents
    // $result = file_ger_contents(API_URL);//si solo quieres hacer un GET de una API
    $data = json_decode($result, true);
    curl_close($ch);
    //var_dump($data);
?>
<head>
    <title>La proxima pelicula de Marvel</title>
    <meta charset="UTF-8"/>
    <meta name="description" content="La proxima pelicula de Marvel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    >
</head>
<main>
    <!--<pre style="font-size: 20px; overflow: scroll; height: 650px;">-->
        <?php /*var_dump($data);*/?>
    <!--</pre>-->
    <section>
        <img src="<?= $data["poster_url"];?>" width="300" alt="Poster de <?=$data["title"]; ?>" style="border-radius: 16px"/>
    </section>
    <hgroup>
        <h3><?=$data["title"]; ?> se estrena en <?=$data["days_until"];?></h3>
        <p>Fecha de estreno: <?=$data["release_date"];?></p>
        <p>La siguiente es: <?=$data["following_production"]["title"];?></p>
    </hgroup>
</main>

<style>
    :root{
        color-scheme: light dark;
    }
    body{
        display: grid;
        place-content: center;
    }
    section{
        display: flex;
        justify-content: center;
        text-align: center;
    }
    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
</style>

 <!--Modificaciones de prueba para git
 Israel >-->