<html>
<head>
<title>Calculando P.A.</title>
</head>
<body>
<form action = "" method = "post"><br/>
<label>Entre com o Número de Termos :  </label>
<input type="text" name ="termos" size="3" /><br/>
<label>Entre com o Primeiro Termos : </label>
<input type="text" name="primeiro" size="3"><br/>
<label>Entre com a Razão : </label>
<input type="text" name = "razao" size="3"><br/>
<label>PA ou PG: </label>
<input type="text" name = "papg" size="3"><br/>
<label>Escolher nome Json: </label>
<input type="text" name = "json" size="3"><br/>
<input type="submit" name = "Enviar" value = "Enviar"><br/><br/>
</form>
<?php 


	$listaPA;
	$listaPG;
     function pa($n, $p, $r)
	 {
	    if ($n >= 1)
		    {
			echo "PA: ";
			$soma = $p;
			$listaPA[0] = 'pa';
			$listaPA[1] = $soma;
			echo $soma;
			for ($i=1; $i<=$n-1; $i++)
			   {
			   $soma = ($soma+$r);
			   $listaPA[$i+1] = $soma;
			   echo ","."$soma";
			   }
			   
			echo"<br/>";
			}
		else
            echo"Erro: Número de termos da PA menor que 1";
		$dados_json = json_encode($listaPA);
		$json = $_POST['json'];
		$fp = fopen("$json.json", "w");	
		fwrite($fp, $dados_json);
 	fclose($fp);		
	 }
	 function pg($n, $p, $r)
	 {
		if ($n >= 1)
		{
		echo "PG: ";
			$soma = $p;
			$listaPG[0] = 'pg';
			$listaPG[1] = $soma;
			echo $soma;
			for ($i=1; $i<=$n-1; $i++)
			   {
			   $soma = ($soma*$r);
			   $listaPG[$i+1] = $soma;
			   echo ","."$soma";
			   }
			   
			echo"<br/>";
			}
		else
            echo"Erro: Número de termos da Pg menor que 1";	 
		$dados_json = json_encode($listaPG);
		$json = $_POST['json'];
		$fp = fopen("$json.json", "w");	
		fwrite($fp, $dados_json);
		fclose($fp);
	 }
$n = $_POST['termos'];
$p = $_POST['primeiro'];
$r = $_POST['razao'];
$papg = $_POST['papg'];

if ($papg == 'pa')
{
	pa($n,$p,$r);
	
}
else
	pg($n,$p,$r);
	
?>
</body>
</html>