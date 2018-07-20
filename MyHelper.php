<?php
/*
 * Autor: Peterson Passos
 * peterson.jfp@gmail.com
 * 51 9921298121
 */

use Illuminate\Support\Carbon;

/* Datas
  ############################################################### */

/**
 * recebe aaaa-mm-aa e retorna dd/mm/aaaa
 */
function pw_Data_USA_to_BR($data) {
    $nova_data = implode('/', array_reverse(explode('-', $data)));
    return $nova_data;
}

/**
 * recebe dd/mm/aaaa e retorna aaaa-mm-dd 
 */
function pw_Data_BR_to_USA($data) {
    $nova_data = implode('-', array_reverse(explode('/', $data)));
    return $nova_data;
}

/**
 * calcula a diferença em dias entre duas datas e a retorna
 */
function pw_calcularDiferencaEmDias($data_maior, $data_menor) {
    $d1 = strtotime($data_maior);
    $d2 = strtotime($data_menor);
    $diferenca = $d1 - $d2;
    $dias = (int) floor($diferenca / (60 * 60 * 24));
    return $dias;
}

/**
 * calcula a diferença em segundos entre duas datas ou datetimes e a retorna
 */
function pw_calcularDiferencaEmSegundos($data_maior, $data_menor) {
    return Carbon::parse($data_maior)->diffInSeconds(Carbon::parse($data_menor));
}

/**
 * adiciona a quantidade passada como parametro de dias a uma data e a retorna
 */
function pw_adicionarDiasAUmaData($data_atual, $dias_a_ser_adicionado) {
    $data = date('Y-m-d', strtotime("$dias_a_ser_adicionado days", strtotime($data_atual)));
    return $data;
}

/**
 * adiciona a quantidade passada como parametro de dias a um datetime e a retorna
 */
function pw_adicionarDiasAUmDatetime($datetime_atual, $dias_a_ser_adicionado) {
    $hora = pw_retornarHoraInserindoDateTime($datetime_atual);
    $data_atual = pw_retornarDataInserindoDateTime($datetime_atual);
    $data = date('Y-m-d', strtotime("$dias_a_ser_adicionado days", strtotime($data_atual)));
    return "$data $hora";
}

/**
 * retorna a data atual no formato aaaa-mm-dd
 */
function pw_getData() {
    $data = date('Y-m-d');
    return $data;
}

/**
 * retorna um datetime atual no formato aaaa-mm-dd hh:min:seg
 */
function pw_getDatetime() {
    $data = date('Y-m-d H:i:s');
    return $data;
}

/**
 * retorna o ano atual
 */
function pw_getAno() {
    $data = date('Y');
    return $data;
}

/**
 * retorna o mes atual
 */
function pw_getMes() {
    $data = date('m');
    return $data;
}

/**
 * retorna o nome do mes atual
 */
function pw_getNomeDoMesAtual() {
    return pw_getNomeDoMes(pw_getMes());
}

/**
 * Recebe o mes atual (com duas casas 01,02...12) e retorna seu nome
 */
function pw_getNomeDoMes($mes) {
    $meses = array(
      '01' => 'Janeiro',
      '02' => 'Fevereiro',
      '03' => 'Março',
      '04' => 'Abril',
      '05' => 'Maio',
      '06' => 'Junho',
      '07' => 'Julho',
      '08' => 'Agosto',
      '09' => 'Setembro',
      '10' => 'Outubro',
      '11' => 'Novembro',
      '12' => 'Dezembro'
    );

    return $meses[$mes];
}

/**
 * ler a data e transformar em String em formato: Dia do mês de Ano.
 * @param Data Formato = AAAA-MM-DD
 * 
 * @return str dia(quinta 05) de mês(extenso) de Ano(2018).
 */
function pw_DataPorExtenso($data) {
    if (empty($data)) {
        return null;
    }

    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');

    return strftime('%A, %d de %B de %Y', strtotime($data));
}

/**
 * retorna o dia atual
 */
function pw_getDia() {
    date_default_timezone_set("America/Sao_Paulo");
    $data = date('d');
    return $data;
}

/**
 * retorna mm-dd
 */
function pw_getMesEDia() {
    date_default_timezone_set("America/Sao_Paulo");
    $data = date('m-d');
    return $data;
}

/**
 * recebe HH:mm:ss e retorna 00h00min00s
 */
function pw_formatarHora($hora, $exibir_segundos = false) {
    $array = explode(':', $hora);
    $h = $array[0];
    $min = $array[1];
    $s = $array[2];
    if ($exibir_segundos) {
        $hora_formatada = "$h" . "h" . "$min" . "min" . "$s" . "s";
    } else {
        $hora_formatada = "$h" . "h" . "$min" . "min";
    }
    
    return $hora_formatada;
}

/**
 * insere aaaa-mm-dd hh:mm:ss e retorna
 * dd/mm/aaaa 00h00min00s
 */
function pw_formatarDateTime($dateTime, $exibir_segundos = false) {
//9h25min6s
    $array = explode(' ', $dateTime);
    $data = pw_Data_USA_to_BR($array[0]);
    $hora = pw_formatarHora($array[1], $exibir_segundos);
    return "$data $hora";
}

/**
 * insere aaaa-mm-dd hh:mm:ss e retorna aaaa-mm-dd
 */
function pw_retornarDataInserindoDateTime($dateTime) {
    $dataArray = explode(' ', $dateTime);
    return $dataArray[0];
}

/**
 * insere aaaa-mm-dd hh:mm:ss e retorna hh:mm:ss
 */
function pw_retornarHoraInserindoDateTime($dateTime) {
    $dataArray = explode(' ', $dateTime);
    return $dataArray[1];
}

/**
 * Compara duas datas ou datetimes devolvendo true se a primeira for maior
 * e false se a primeira for menor.
 */
function pw_compararData($data_1, $data_2) {
    if (strtotime($data_1) > strtotime($data_2)) {
        return TRUE;
    } else {
        return FALSE;
    }
}

/**
 * adiciona o numero passado de anos a uma data e a retorna
 * formato esperado aaaa-mm-dd
 */
function pw_adicionarAnosAUmaData($data, $numero_de_anos) {
    $array = explode('-', $data);
    $ano = $array[0];
    $mes = $array[1];
    $dia = $array[2];
    $ano_somado = $ano + $numero_de_anos;
    $data_final = "$ano_somado-$mes-$dia";
    return $data_final;
}

/* manipulação de string
  ############################################################################ */

/**
 * Recebe um texto e o numero máximo de caracteres e retorna um resumo do texto.
 */
function pw_criarResumo($texto, $QuantidadeCaracteres) {
    $Texto = strip_tags($texto);
    if (strlen($Texto) > $QuantidadeCaracteres) {
        while (substr($Texto, $QuantidadeCaracteres, 1) <> ' ' && ($QuantidadeCaracteres < strlen($Texto))) {
            $QuantidadeCaracteres++;
        }
        return substr($Texto, 0, $QuantidadeCaracteres) . '...';
    } else {
        return $texto;
    }
}

/**
 * Recebe uma frase ou palavra escrita da forma comum e retorna um slug dessa
 * mesma frase ou palavra.
 */
function pw_criarSlug($string) {
    $string = strtolower(trim(utf8_decode($string)));
    $before = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr²³°';
    $after = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr23o';
    $string = strtr($string, utf8_decode($before), $after);
    $replace = array(
      '/[^a-z0-9.-]/' => '-',
      '/-+/' => '-',
      '/\-{2,}/' => ''
    );
    $string = preg_replace(array_keys($replace), array_values($replace), $string);
    $string = preg_replace(array('/([`^~\'"])/', '/([-]{2,}|[-+]+|[\s]+)/', '/(,-)/'), array(null, '-', ', '), iconv('UTF-8', 'ASCII//TRANSLIT', $string));
    return $string;
}

/**
 * Monta um alert-dismissable do bootstrap 3 com a mensagem e o tipo passados e o retorna
 */
function pw_AlertBt3($mensagem, $tipo = 'primary') {
    $alert = "	<div class='alert alert-$tipo alert-dismissible fade in text-center' style='border: 1px solid #000;' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>x</span>
                    </button>
                    <strong>$mensagem</strong> 
                </div>";
    return $alert;
}

/* manipulação de csv
  ############################################################################ */

function pw_gerarEBaixarCsv($array_de_arrays) {
    pw_cabecalhoDownloadCsv("contatos-" . date("d-m-Y") . ".csv");
    echo pw_arrayParaCsv($array_de_arrays);
    die();
}

/**
 * verifica de a string passada é um Json e retorna true ou false
 */
function pw_isJson($string) {
    return ((is_string($string) &&
            (is_object(json_decode($string)) ||
            is_array(json_decode($string))))) ? true : false;
}

function pw_arrayParaCsv(array &$array) {
    if (count($array) == 0) {
        return null;
    }
    ob_start();
    $df = fopen("php://output", 'w');
    fputcsv($df, array_keys(reset($array)));
    foreach ($array as $row) {
        fputcsv($df, $row);
    }
    fclose($df);
    return ob_get_clean();
}

function pw_cabecalhoDownloadCsv($filename) {
// desabilitar cache
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");

// forçar download  
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");

// disposição do texto / codificação
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
}

/* Valores
  ################################################################ */

/**
 * recebe um numero com virgula (R$ 99,90) e retorna um com ponto (99.00)
 */
function pw_valorRealParaDecimal($valor) {
//deixar so a virgula como caractere especial
    $valor1 = preg_replace('/[^[:digit:]_,]/', '', $valor);
//trocar virgula por ponto
    $valor2 = implode('.', (explode(',', $valor1)));
//formatar o numero com 2 casas decimais
    $valor3 = number_format($valor2, "2", ".", "");
    return $valor3;
}

/**
 * recebe um numero decimal separado por ponto (9999.80) e retorna o mesmo 
 * numero formatado para exibição na tela como real brasileiro (R$ 9.999,80)
 */
function pw_valorDecimalParaReal($valor) {
    $valor2 = number_format($valor, "2", ",", ".");
    $valor3 = "R$ $valor2";
    return $valor3;
}

/* manipulação de arquivos em geral e outras funções úteis
  ############################################################### */

/**
 * Recebe o caminho da pasta e um nome de arquivo e analisa se ja existe um arquivo
 * com o mesmo nome na pasta passada como parametro, retorna TRUE caso o nome 
 * esteja disponivel e FALSE cajo o nome já esteja sendo usado naquela pasta
 */
function pw_VerSeNomeEstaDisponivel($pasta, $nome_do_arquivo) {
    $nomeDosArquivosNaPasta = scandir($pasta);
    $nomeDisponivel = TRUE;
    foreach ($nomeDosArquivosNaPasta as $nomeArquivoNaPasta) {
        if ($nomeArquivoNaPasta == $nome_do_arquivo) {
            $nomeDisponivel = FALSE;
        }
    }
    return $nomeDisponivel;
}

/**
 * recebe um caminho completo com nome do arquivo ex.:assets-img/img2.jpg e faz
 * o download desse arquivo para o pc do usuario
 */
function pw_forcarDownload($caminho_e_nome_do_arquivo_em_relacao_a_classe_arquivo) {
    $arquivo = $caminho_e_nome_do_arquivo_em_relacao_a_classe_arquivo;

    $testa = substr($arquivo, -3);
    $bloqueados = array('php', 'tml', 'htm', 'tml');
// caso a extensão seja diferente das citadas acima ele 
// executa normalmente o script 

    if (!in_array($testa, $bloqueados)) {

        if (isset($arquivo) && file_exists($arquivo)) { // faz o teste se a variavel não esta vazia e se o arquivo realmente existe
            switch (strtolower(substr(strrchr(basename($arquivo), "."), 1))) { // verifica a extensão do arquivo para pegar o tipo
                case "pdf": $tipo = "application/pdf";
                    break;
                case "exe": $tipo = "application/octet-stream";
                    break;
                case "zip": $tipo = "application/zip";
                    break;
                case "doc": $tipo = "application/msword";
                    break;
                case "xls": $tipo = "application/vnd.ms-excel";
                    break;
                case "ppt": $tipo = "application/vnd.ms-powerpoint";
                    break;
                case "gif": $tipo = "image/gif";
                    break;
                case "png": $tipo = "image/png";
                    break;
                case "jpg": $tipo = "image/jpg";
                    break;
                case "mp3": $tipo = "audio/mpeg";
                    break;
                case "php": // deixar vazio por seurança
                case "htm": // deixar vazio por seurança
                case "html": // deixar vazio por seurança
            }
            header("Content-Type: " . $tipo); // informa o tipo do arquivo ao navegador
            header("Content-Length: " . filesize($arquivo)); // informa o tamanho do arquivo ao navegador
            header("Content-Disposition: attachment; filename=" . basename($arquivo)); // informa ao navegador que é tipo anexo e faz abrir a janela de download, tambem informa o nome do arquivo
            readfile($arquivo); // lê o arquivo
            exit; // aborta pós-ações
        }
    } else {
        echo "Erro!";
        exit;
    }
}

/* Geração de senha, identificadores e string aleatórias
  ############################################################### */

/**
 * gera uma senha aleatoria contendo numeros e letras minusculas
 */
function pw_gerarSenha($tamanho) {
    if ($tamanho > 0) {
        $id_aleatorio = "";
        for ($i = 1; $i <= $tamanho; $i++) {
            $numero = rand(1, 36);
            $id_aleatorio .= pw_valorAleatorio($numero);
        }
    } else {
        return '';
    }
    return $id_aleatorio;
}

/**
 * gera um identificador unico alfanumerico baseado no microsegundo atual com prefixo(6) e sufixo(6) aleatorios
 * retorna uma string unica de aproximadamente 25 algarismos
 * 
 * Pode ser retornada em lower case ou mixed case
 */
function pw_gerarIdUnico($lower = true) {
    $p1 = pw_gerarSenha(6);
    $p2 = uniqid();
    $p3 = pw_gerarSenha(6);
    $id = "$p1" . "$p2" . "$p3";

    if ($lower) {
        return strtolower($id);
    }
    return $id;
}

function pw_valorAleatorio($numero) {
    switch ($numero) {
        case "1":
            return "A";
        case "2":
            return "B";
        case "3":
            return "C";
        case "4":
            return "D";
        case "5":
            return "E";
        case "6":
            return "F";
        case "7":
            return "G";
        case "8":
            return "H";
        case "9":
            return "I";
        case "10":
            return "J";
        case "11":
            return "K";
        case "12":
            return "L";
        case "13":
            return "M";
        case "14":
            return "N";
        case "15":
            return "0";
        case "16":
            return "P";
        case "17":
            return "Q";
        case "18":
            return "R";
        case "19":
            return "S";
        case "20":
            return "T";
        case "21":
            return "U";
        case "22":
            return "V";
        case "23":
            return "W";
        case "24":
            return "X";
        case "25":
            return "Y";
        case "26":
            return "Z";
        case "27":
            return "0";
        case "28":
            return "1";
        case "29":
            return "2";
        case "30":
            return "3";
        case "31":
            return "4";
        case "32":
            return "5";
        case "33":
            return "6";
        case "34":
            return "7";
        case "35":
            return "8";
        case "36":
            return "9";
        default :
            return 'A';
    }
}
