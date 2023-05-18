<?php

 switch(@$_REQUEST["acao"])
    {
        case 'cadastrar':
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $senha = md5($_POST['senha']);
            $confirmacao_senha = md5($_POST['confirmacao_senha']);
            $cpf = $_POST['cpf'];
            $email = $_POST['email'];

        $sql = "INSERT INTO cadastro (nome,sobrenome,senha,confirmacao_senha,cpf,email) values ('{$nome}','{$sobrenome}','{$senha}','{$confirmacao_senha}','{$cpf}','{$email}')";
        $res = $conn1 -> query($sql);

        if($res== true)
        {
            print "<script> alert('Cadastro realizado com sucesso')</script>";
            print "<script> location.href='?page=listar';</script>";
        }
        else
        {
             print "<script> alert('erro ao cadastrar usuario')</script>";
        }
            break;

        case 'editar':
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $senha = md5($_POST['senha']);
            $confirmacao_senha	= md5($_POST['confirmacao_senha']);
            $cpf = $_POST['cpf'];
            $email = $_POST['email'];
    
            $sql = "UPDATE cadastro SET 
                    nome = '{$nome}',
                    sobrenome = '{$sobrenome}',
                    senha = '{$senha}',
                    confirmacao_senha = '{$confirmacao_senha}',
                    cpf = '{$cpf}',
                    email = '{$email}'
                    
                    where id =".$_REQUEST["id"];
             $res = $conn1->query($sql);
    
            if($res == true){
                print "<script> alert('Editado com sucesso!!! ')</script>";
                print"<script>  location.href='?page=listar';</script>";
            }else{
                print"<script>alert('Erro ao editar o usuario')</script>";
            }
    
            break;
        case 'excluir':
                $sql = "DELETE FROM cadastro WHERE id=" .$_REQUEST["id"];

                $res = $conn1 -> query($sql);

                if($res== true) 
                {
                    print "<script> alert('Usuario deletado com sucesso')</script>";
                    print "<script> location.href='?page=listar';</script>";
                }
                else{
                    print "<script> alert('Falha ao deletar usuario')</script>";
                }
                break;
        case 'editar_animal':
            $animal = $_POST['animal'];
            $localizacao = $_POST['localizacao'];
            $email = $_POST['email'];
    
            $sql = "UPDATE paraadotar SET 
                    animal = '{$animal}',
                    localizacao = '{$localizacao}',
                    email = '{$email}'
                    where id =".$_REQUEST["id"];
             $res = $conn1->query($sql);
    
            if($res == true){
                print "<script> alert('Editado com sucesso!!! ')</script>";
                print"<script>  location.href='?page=listar_animal';</script>";
            }else{
                print"<script>alert('Erro ao editar o usuario')</script>";
            }
            break;    

        case 'excluir_animal':
            $sql = "DELETE FROM paraadotar WHERE id=" .$_REQUEST["id"];

            $res = $conn1 -> query($sql);

            if($res== true) 
            {
                print "<script> alert('animal deletado com sucesso')</script>";
                print "<script> location.href='?page=listar';</script>";
            }
            else{
                print "<script> alert('Falha ao deletar animal')</script>";
            }
            break;
    }
      