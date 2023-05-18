<?php


class AnimalDB
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new conexao();
    }
    public function cadastrarAnimal($animal,$localizacao,$email,$nome_bichinho)
    {
       if(empty($animal) || empty($localizacao) || empty($email) || empty($nome_bichinho))
       {
            print "<script>alert('ceritifique-se que informou todas as informacoes corretamente')</script>";
            print "<script>location:formParaAdotar.php</script>";
       }
       else
       {
        $result = "INSERT INTO paraadotar (animal,localizacao,email,nome_bichinho) VALUES ('{$animal}','{$localizacao}','{$email}','{$nome_bichinho}')";

        $res = mysqli_query($this->conexao->getConn(),$result);

        if(mysqli_affected_rows($this-> conexao ->getConn())>0)
        {
            return true;
        }
        else
        {
            return false;
        }
       }
    }
}