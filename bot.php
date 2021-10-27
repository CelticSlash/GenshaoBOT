<?php
    //Lendo mensagens do JSON
    $url = "https://raw.githubusercontent.com/CelticSlash/GenshaoBOT/main/data.json";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $mensagens = curl_exec($curl);
    $mensagens = json_decode($mensagens, true);

    //Seleciona mensagem aleatoria
    $rand = rand(0, count($mensagens["genshin"]) -1);
    $msg = $mensagens["genshin"][$rand];

    //Usando webhook
    $mensagem = array(
        'content' => $msg["mensagem"],
        'username' => $msg["boneco"],
        'avatar_url' => $msg['foto']
    );

    $url = 'https://discord.com/api/webhooks/902703249231052830/cGlkb5W11JABV_g3lMyGABHwvXPi4JmaNrTQt4TmD6qQBRqg1amUgoyh-Vpl46xbaJJZ';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($mensagem));
    $erro = curl_exec($curl);

    var_dump($erro);
?>