<?php
require 'MyHelper.php';
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

$getpost                    = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$numero                     = $getpost['numero'];
$data_primeiro_vencimento   = $getpost['data_primeiro_vencimento'];
$valor                      = $getpost['valor'];
$valor_por_extenso          = strtoupper($getpost['valor_por_extenso']);
$nome_pagador               = strtoupper($getpost['nome_pagador']);
$cpf_pagador                = $getpost['cpf_pagador'];
$rg_pagador                 = $getpost['rg_pagador'];
$endereco_pagador           = strtoupper($getpost['endereco_pagador']);
$nome                       = strtoupper($getpost['nome']);
$cpf                        = $getpost['cpf'];
$cidade                     = strtoupper($getpost['cidade']);
$estado                     = strtoupper($getpost['estado']);
$data_hoje                  = strtoupper(strftime('%d de %B de %Y', strtotime('today')));
$folha_fechada              = true;

// var_dump($data_primeiro_vencimento);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Promissórias</title>
    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
    <!-- Latest compiled and minified bootstrap 3 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body class="A4">
    <?php for($i=1; $i<=$numero; $i++): 
        $data_vencimento = new DateTime($data_primeiro_vencimento);
        $data_vencimento->add(new DateInterval('P'.($i-1).'M'));
        ?>

        <?php if($folha_fechada): 
            $folha_fechada = false;?>
            <section class="sheet padding-10mm">
        <?php endif ?> 

        <div style="width: 100%; border:5px double black;">
            <p style="text-align:center;border-bottom:5px double black;padding:6px;font-weight: bolder;">
                REPÚBLICA FEDERATIVA DO BRASIL
            </p>
            <p style="text-align:center;border-bottom:3px solid black;padding-bottom:10px;font-weight: bolder;">
                NOTA PROMISSÓRIA
            </p>
            <div class="row">
                <div class="col-md-12" style="padding-right:25px;padding-left:25px;">
                    <div class="pull-left">N° <?= sprintf("%02d", $i) ?>/<?= sprintf("%02d", $numero) ?></div>
                    <div class="pull-right">
                        Vencimento:  
                        <?= strtoupper(strftime('%d de %B de %Y', strtotime($data_vencimento->format('Y-m-d')))) ?>
                    </div>
                </div>
            </div>
            <p style="padding:10px;">Valor: <?= pw_valorDecimalParaReal($valor) ?></p>
            <p style="padding:10px; text-align: justify;">
            No dia 
            <?= strtoupper(strftime('%d de %B de %Y', strtotime($data_vencimento->format('Y-m-d')))) ?>
            pagarei por esta única via de NOTA PROMISSÓRIA 
            na praça de <?= $cidade ?>/<?= $estado ?> a <?= $nome ?> inscrito no CPF N° <?= $cpf ?>
            ou à sua ordem a quantia de <?= $valor_por_extenso ?> em moeda corrente deste país.
            </p>
            <p class="text-center"><?= $cidade ?>, <?= $data_hoje ?></p>
            <br><br>
            <p class="text-center">____________________________________________________</p>
            <p class="text-center" style="margin-bottom: 0"><?= $nome_pagador ?></p>
            <p class="text-center" style="margin-bottom: 0">RG <?= $rg_pagador ?></p>
            <p class="text-center">CPF <?= $cpf_pagador ?></p>
            <p style="padding-right:10px;padding-left:10px;">Endereço do emitente:</p>
            <p style="padding-right:10px;padding-left:10px;"><?= $endereco_pagador ?></p>
        </div>

        <?php if(!$folha_fechada && $i % 2 == 0): 
            $folha_fechada = true;
            ?>
            </section>
        <?php else: ?> 
            <br><br>
        <?php endif ?> 
        
    <?php endfor ?>
</body>
</html>