<?php
include_once "clsPet.php";

$pet = new petshop();

$codPet = filter_input(INPUT_GET, "codPet", FILTER_VALIDATE_INT);
$nome = filter_input(INPUT_GET, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
$gen = filter_input(INPUT_GET, "gen", FILTER_SANITIZE_SPECIAL_CHARS);
$nasc = filter_input(INPUT_GET, "nasc");
$tutor = filter_input(INPUT_GET, "tutor", FILTER_SANITIZE_SPECIAL_CHARS);


$pet->setcodPet($codPet);
$pet->setnome($nome);
$pet->setgen($gen);
$pet->setnasc($nasc);
$pet->settutor($tutor);

if (isset($_GET["Inserir"])) {
    echo $pet->Inserir();
} else if (isset($_GET["Excluir"])) {
    echo $pet->Apagar();
}
else if (isset($_GET["Alterar"])){
    echo $pet->Alterar();
}
else if (isset($_GET["Pesquisar"])){
    echo $pet->Pesquisar();
}

else if (isset($_GET["Pesquisar"])){
    $dados = $pet->Pesquisar();

    if(empty($dados)){
        echo "<script> alert ('Matricula nao localizada') </script>";
        echo "<script>document.location='index.php'</script>";
    }
    else{
     foreach($dados as $dd){
        echo "codPet {$dd['codPet']} <br>";
        echo "nome {$dd['nome']} <br>";
        echo "gen {$dd['gen']} <br>";
        echo "nasc {$dd['nasc']} <br>";
        echo "tutor {$dd['tutor']} <br>";

     } 


    }

}


?>
