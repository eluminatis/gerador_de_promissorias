<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerador de promissórias</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>body{ background-color: #cecece; }</style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3"> </div>
            <div class="col-md-6" style="border: 3px solid white; margin-top:10px;background-color: #e1e1e1">
                <h1 class="text-primary text-center">Gerador de promissórias</h1>
                <form method='post' action="processar.php">
                    <fieldset>
                        <!-- Numero -->
                        <div class='form-group '>
                            <label class='control-label' for='numero'>Número de promissórias</label>
                            <input id='numero' name='numero' type='number' placeholder='Número de promissórias' class='form-control input-md' min="1" required>
                        </div>
                        <!-- Data primeiro vencimento -->
                        <div class='form-group '>
                            <label class='control-label' for='data_primeiro_vencimento'>Data primeiro vencimento</label>
                            <input id='data_primeiro_vencimento' name='data_primeiro_vencimento' type='date' value="" placeholder='Data primeiro vencimento' class='form-control input-md' required>
                        </div>
                        <!-- Valor -->
                        <div class='form-group '>
                            <label class='control-label' for='valor'>Valor</label>
                            <input id='valor' name='valor' type='number' step="0.01" placeholder='Valor' class='form-control input-md' required>
                        </div>
                        <!-- Valor por extenso -->
                        <div class='form-group '>
                            <label class='control-label' for='valor_por_extenso'>Valor por extenso</label>
                            <input id='valor_por_extenso' name='valor_por_extenso' type='text' value="" placeholder='Valor por extenso' class='form-control input-md' required>
                        </div>
                        <!-- Nome pagador -->
                        <div class='form-group '>
                            <label class='control-label' for='nome_pagador'>Nome pagador</label>
                            <input id='nome_pagador' name='nome_pagador' type='text' value="" placeholder='Nome pagador' class='form-control input-md' required>
                        </div>
                        <!-- Cpf pagador -->
                        <div class='form-group '>
                            <label class='control-label' for='cpf_pagador'>Cpf pagador</label>
                            <input id='cpf_pagador' name='cpf_pagador' type='text' value="" placeholder='Cpf pagador' class='form-control input-md' required>
                        </div>
                        <!-- Rg pagador -->
                        <div class='form-group '>
                            <label class='control-label' for='rg_pagador'>Rg pagador</label>
                            <input id='rg_pagador' name='rg_pagador' type='text' value="" placeholder='Rg pagador' class='form-control input-md' required>
                        </div>
                        <!-- Endereco pagador -->
                        <div class='form-group '>
                            <label class='control-label' for='endereco_pagador'>Endereco pagador</label>
                            <input id='endereco_pagador' name='endereco_pagador' type='text' value="" placeholder='Endereco pagador' class='form-control input-md' required>
                        </div>
                        <!-- Nome -->
                        <div class='form-group '>
                            <label class='control-label' for='nome'>Nome - recebedor</label>
                            <input id='nome' name='nome' type='text' value="Iria Eni Hirsch" class='form-control input-md' required>
                        </div>
                        <!-- Cpf -->
                        <div class='form-group '>
                            <label class='control-label' for='cpf'>Cpf - recebedor</label>
                            <input id='cpf' name='cpf' type='text' value="195.322.530-68" class='form-control input-md' required>
                        </div>
                        <!-- Cidade -->
                        <div class='form-group '>
                            <label class='control-label' for='cidade'>Cidade - recebedor</label>
                            <input id='cidade' name='cidade' type='text' value="Gravataí" class='form-control input-md' required>
                        </div>
                        <!-- Estado -->
                        <div class='form-group '>
                            <label class='control-label' for='estado'>Estado - recebedor</label>
                            <input id='estado' name='estado' type='text' value="RS" class='form-control input-md' required>
                        </div>
                        <br>
                        <div class="clearfix"></div>
                        <button type='submit' class='btn btn-lg btn-primary'>Gerar promissórias</button>
                        <br><br>
                    </fieldset>
                </form>
            </div>
        </div>
        <br><br>
    </div>
</body>
</html>