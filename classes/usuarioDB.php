<?php

    class UsuarioDB
    {
        private $conexao;

        public function __construct()
        {
            $this-> conexao = new conexao();
        }
        public function login($cpf,$senha)
        {
            $result = "SELECT *FROM cadastro WHERE cpf =? and senha =? ";

            $stmt = mysqli_prepare($this->conexao->getConn(),$result);
            mysqli_stmt_bind_param($stmt,"ss",$cpf,$senha);
            mysqli_stmt_execute($stmt);
            $res= mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($res)>0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function unico($cpf)
        {
            $unico = "SELECT *FROM cadastro where cpf= ?";

            $stmt = mysqli_prepare($this->conexao->getConn(),$unico);
            mysqli_stmt_bind_param($stmt,"s",$cpf);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($res)>1)
            {
                return false;
            }
            else
            {
                return true;
            }
        }

        
        public function cadastrar($nome,$sobrenome,$senha,$confirmacao_senha,$cpf,$email)
        {

            //filter_var (necessaria passada de dois paramentros , o nome da variavel e o metodo de s)
            $nome = filter_var($nome, FILTER_SANITIZE_STRING);
            $sobrenome= filter_var($sobrenome, FILTER_SANITIZE_STRING);
            $senha= filter_var($senha, FILTER_SANITIZE_STRING);
            $confirmacao_senha= filter_var($confirmacao_senha, FILTER_SANITIZE_STRING);
            $cpf= filter_var($cpf,FILTER_SANITIZE_STRING);
            $email =  filter_var($email, FILTER_SANITIZE_STRING);
            
            if(empty($nome) or empty($sobrenome)or empty($senha) or empty($confirmacao_senha)or empty($cpf)or empty($email))//verificacao se os campos estao preenchidos
            {
                print "<script> alert('Certifique-se que informou todas as informações')</script>";
                print "<script> location.href='cadastro.php'</script>";
            }
            else {


               $sql = "INSERT INTO cadastro (nome,sobrenome,senha,confirmacao_senha,cpf,email) values 
               ('{$nome}','{$sobrenome}','{$senha}','{$confirmacao_senha}','{$cpf}','{$email}')";
   
               $res = mysqli_query($this->conexao->getConn(),$sql);
   
               if(mysqli_affected_rows($this->conexao->getConn()) > 0) 
               {
                   return true;
                 } 
                 else
                {
                   return false;
                 }
              } 
            }
  public function RedefineSenha($senha,$confirmacao_senha,$cpf)
        {
            $cpf = filter_var($cpf, FILTER_SANITIZE_STRING);
            $senha=filter_var($senha,FILTER_SANITIZE_STRING);
            $confirmacao_senha= filter_var($confirmacao_senha,FILTER_SANITIZE_STRING,);
            
            if(empty($senha)or empty($confirmacao_senha)or empty($cpf))
            {
                print "<script> alert('Certifique-se que informou todas as informações')</script>";
                print "<script> location.href='esqueceu.php'</script>";
            }
            else
            {
              

                $sql = "UPDATE  cadastro SET senha ='{$senha}', confirmacao_senha='{$confirmacao_senha}' WHERE cpf ='{$cpf}'";

                $res = mysqli_query($this->conexao->getConn(),$sql);
                if (mysqli_affected_rows($this->conexao->getConn()) > 0) {
                    return true;
                } else {
                    return false;
                }
                
            }
        } 

    }