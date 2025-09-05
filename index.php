<!DOCTYPE HTML>  
    <html>
    <head>
    -
    </head>
    <body>  

    <?php
    // define variables and set to empty values
    $altura;
    $peso;
    $imc = "";
    $mensagem = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $altura = test_input($_POST["altura"]);
      $peso = test_input($_POST["peso"]);

      $imc = $peso / ($altura * $altura);

      if ($imc < 18.5){
          $mensagem = 'Você esta classificado como abaixo do peso';
      }elseif($imc>=18.5 && $imc<=25) {
          $mensagem = 'Você esta classificado como peso normal';
      }elseif($imc>=25 && $imc<=30) {
          $mensagem = 'Você esta classificado como sobrepeso';
      }else{
          $mensagem = 'Você esta classificado como Obesidade';
      }
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    ?>
        <div class="box">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <fieldset>
                    <legend><b>Formulario de Notas</b></legend>
                    <h3>Informe a sua altura em metros</h3><br>
                    Altura: <input type="text" name="altura" class="inputUser">
                    <br><br>
                    <h3>Informe o seu peso em quilogramas</h3><br>
                    Peso: <input type="text" name="peso">
                    <br><br>
                    <input type="submit" name="submit" value="submit" class="inputUser">
            </form>
        </div>
    <?php
    echo "<h2>Seu IMC é: $imc</h2><br>";
    echo $mensagem;
    ?>

    </body>
    </html>

