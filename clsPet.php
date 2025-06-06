<?php
class petshop {
    private $codPet;
    private $nome;
    private $gen;
    private $nasc;
    private $tutor;

    public function getcodPet() {
        return $this->codPet;
    }

    public function setcodPet($cdp) {
        $this->codPet = $cdp;
    }

    public function getnome() {
        return $this->nome;
    }

    public function setnome($nm) {
        $this->nome = $nm;
    }

    public function getgen() {
        return $this->gen;
    }

    public function setgen($ge) {
        $this->gen = $ge;
    }

    public function getnasc() {
        return $this->nasc;
    }

    public function setnasc($ns) {
        $this->nasc = $ns;
    }

    public function gettutor() {
        return $this->tutor;
    }

    public function settutor($tt) {
        $this->tutor = $tt;
    }

    public function Inserir() {
        $conexao = include "conexao.php";

        try {
            $comando = $conexao->prepare("INSERT INTO Petshop (codPet, nome, gen, nasc, tutor) VALUES (?, ?, ?, ?, ?)");
            $comando->bindParam(1, $this->codPet);
            $comando->bindParam(2, $this->nome);
            $comando->bindParam(3, $this->gen);
            $comando->bindParam(4, $this->nasc);
            $comando->bindParam(5, $this->tutor);

            $comando->execute();

            return "Pet inserido com sucesso!";
        } catch (PDOException $Erro) {
            return "Erro: " . $Erro->getMessage();
        }
    }

    public function Apagar() {
        $conexao = include "conexao.php";

        try {
            $comando = $conexao->prepare("DELETE FROM Petshop WHERE codPet = ?");
            $comando->bindParam(1, $this->codPet);

            $comando->execute();

            return "Pet apagado com sucesso!";
        } catch (PDOException $Erro) {
            return "Erro ao apagar produto: " . $Erro->getMessage();
        }
    }

    public function Alterar() {
        $conexao = include "conexao.php";

        try {
            $comando = $conexao->prepare("UPDATE Petshop SET nome=?, gen=?, nasc=?, tutor=? WHERE codPet=?");
            $comando->bindParam(1, $this->nome);
            $comando->bindParam(2, $this->gen);
            $comando->bindParam(3, $this->nasc);
            $comando->bindParam(4, $this->tutor);
            $comando->bindParam(5, $this->codPet);

            $comando->execute();

            return "Dado Alterado com sucesso";
        } catch (PDOException $Erro) {
            return "Erro: " . $Erro->getMessage();
        }
    }

   public function Pesquisar() {
    $conexao = include "conexao.php";
    
    try {
        $comando = $conexao->prepare("SELECT codPet, nome FROM petshop WHERE codPet = ?");
        $comando->bindParam(1, $this->codPet);
        $comando->execute();

        $return = $comando->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $Erro) {
        $return = "Erro: " . $Erro->getMessage();
    }

    return $return;
}



}
?>
