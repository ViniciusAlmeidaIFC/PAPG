<html>
<head>
<title>Calculando P.A.</title>
</head>
<body>
<form action = "" method = "post"><br/>
<label>Nome Json: </label>
<input type="text" name = "json" size="3"><br/>
<input type="submit" name = "Upload" value = "Upload"><br/><br/>
</form>
<?php 
$json;
$arquivo;
$upload;
    function upload()
    {
        $json = $_POST['json'];
        $arquivo = file_get_contents("$json.json");
        $upload = json_decode($arquivo);
        $i = 0;
        foreach ($upload as $value) {
            $valores[$i] = $value;
            if ($i > 0){
                if ($i == 1)
                {
                $a1 = $value;
                }
                if ($i == 2)
                {
                    $razao = $value - $a1;
                }
                echo "Valores progressão: <br>".$value."<br>";
                }
            $i= $i+1;
            
        }
            echo "Tipo Progressao: <br>";
            echo papg($valores)."<br>";
            echo "a1: <br>".$a1."<br>";
            echo "Razao: <br>".$razao."<br>";
            echo "Quantidade de Termos: <br>".(sizeof($valores)-1)."<br>";
            echo "Soma: <br>";
            echo soma($valores)."<br>";
            echo "Media: <br>";
            echo media($valores)."<br>";
            echo "Mediana: <br>";
            echo mediana($valores)."<br>";
            echo geraGrafico($valores);
            
    }
    function papg($valores)
    {
        echo $valores[0];
    }
    function soma($valores)
    {
        $soma = 0;
        $tamanho = sizeof($valores);
        for ($i = 1;$i < $tamanho;$i++) {
        $soma = $soma + $valores[$i];
        }
        return $soma;
    } 

    function media($valores){
        $valor = soma($valores);
        $tamanho = sizeof($valores) - 1;
        $media = $valor / $tamanho;
        return $media;
    }
    
    function mediana($valores)
    {
        $tamanho = sizeof($valores)-1;
        if ($tamanho % 2 == 0){
           $x =  intdiv($tamanho, 2);
           $mediana = (($valores[$x]+$valores[$x+1])/2); 
           return $mediana;
        }
        else{
            $x =  intdiv($tamanho, 2);;
            $mediana = $valores[$x+1];
            return $mediana;
        }
        }
        upload();
    function geraGrafico($valores)
    {
    require_once "Header.php";
    require_once "autoload.php";
    echo "<br>";

    /*
    -- Google Charts:
   

    - Gráfico de Linha
    https://developers.google.com/chart/interactive/docs/gallery/linechart


    Montar uma classe para o usuário montar um gráfico.
    */

    $titulo = $valores[0];
    $legenda = "Progressão";
    $nomeEixoX = "Quantidade de Termos";
    $nomeEixoY = "Termos";
    $x = 0;
    for ($i = 1;$i < sizeof($valores); $i++){
        $arrayEixoY[$x] = $i; 
        $x = $x+1;
    }
    $x = 0;
    for ($i = 1;$i < sizeof($valores); $i++){
        $arrayEixoX[$x] = $valores[$i]; 
        $x = $x+1;
    };




    // LINHA
    $tipoColunaX = Linha::TIPO_PALAVRA;

    $oLinha = new Linha($titulo, $legenda, $nomeEixoX, $tipoColunaX, $nomeEixoY, $arrayEixoY,$arrayEixoX);
    echo $oLinha->gerarGrafico();

    }
    
?>

<div id="grafico_linha"></div>
<br><br>


<?php
    require_once "Footer.php";
?>
    }

</body>
</html>