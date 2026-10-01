<?php
    $nome= $_POST['nome'];
    $total= $_POST['total'];
    $idade= $_POST['idade'];
    if(isset($_POST['cartao'])){
        $cartao = "sim";
    }else{
        $cartao = "nao";
    }
    //processamento
    $descontoCartao = 0;
    if($idade==0){
        $descontoIdade=0;
    }else if($idade==1){
        $descontoIdade=5;
    }else{
        $descontoIdade=7;
    }
    if($cartao=="sim"){
        $descontoCartao=5;
    }
    $valorDescontoIdade=$total * ($descontoIdade/100);
    $valorDescontoCartao=$total * ($descontoCartao/100);
    $valorTotalFinal = $total - $valorDescontoIdade - $valorDescontoCartao;
    echo "<h2 style='color:blue; text-align:center;'>Parabens $nome seu desconto foi de 
    $descontoIdade% + $descontoCartao% = ".($descontoIdade+$descontoCartao)."%</h2>";
    echo "<h2 style='color:red; text-align:center;'>O valor final é: R$ $valorTotalFinal</h2>"; 

    /*for ($parcelas=1; $parcelas <=6 ; $parcelas++) { 
        $valorParc= $valorTotalFinal / $parcelas;
        echo "$parcelas x R$ $valorParc<br>";
    }*/
    $parcelas=1;
    while ($parcelas <= 6) {
        $valorParc= $valorTotalFinal / $parcelas;
        echo "$parcelas x R$ $valorParc<br>";
        $parcelas++;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmácia Pareceteloka</title>
    <link rel="stylesheet" href="farmacia.css">
</head>
<body>
    <h1>Parabens <?php echo $nome; ?></h1>
    <p>Seu desconto foi de <?php echo $descontoIdade; ?>% + <?php echo $descontoCartao; ?>% = <?php echo ($descontoIdade+$descontoCartao); ?>%</p>
    <p>O valor final é: R$ <?php echo $valorTotalFinal; ?></p>
</body>
</html>
