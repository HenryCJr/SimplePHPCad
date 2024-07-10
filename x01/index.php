<!DOCTYPE html>
<html lang="pt-br">
<?php include("connect.php"); include("user.php"); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teste de banco</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<main>
    <h1>Adicionar usuário</h1>
    <section>
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">
            <label for="sobrenome">Sobrenome</label>
            <input type="text" name="sobrenome" id="sobrenome">
            <label for="idade">Idade</label>
            <input type="number" name="idade" id="idade">
            <input type="submit" value="Cadastrar">
        </form>
    </section>
    <?php 
    
    $id = $_POST['id'] ?? '';
    
    $nome = $_POST['nome'] ?? '';
    $sobrenome = $_POST['sobrenome'] ?? '';
    $idade = $_POST["idade"] ?? '';
    $edit = $_POST["edit"] ?? '';
    $user = new User($nome, $sobrenome, $idade, date("Y-m-d"));
     if($edit != ''){
        $user->updateUser($id, $nome, $sobrenome, $idade);
    }
    else if($id != ''){
        $user->deleteUser($id);
    }else if($nome != ''){
        $user->createUser($nome, $sobrenome, $idade);
    }
    
    
    ?>

</main>
<main>
    <table>
        <?php 
        $sql = "SELECT * FROM users";
        $users = $msql->query($sql);
        foreach($users as $us){
            echo "<tr><td>" . $us["nm_nome"] .
             "</td><td>" . $us["nm_sobrenome"] .
              "</td><td>" . $us["vl_idade"] .
               "</td><td>" . $us["dt_cadastro"] .
                "</td><td>" . "<form action='" . $_SERVER["PHP_SELF"] . "' method='post'>" .
                 "<input type='hidden' name='id' value='" . $us["id"] . "'>" . "<input type='hidden' name='nome' value='" . $us["nm_nome"] . "'>" . "<input type='hidden' name='sobrenome' value='" . $us["nm_sobrenome"] . "'>" .
                 "<input type='hidden' name='idade' value=" . $us["vl_idade"] . ">" .
                   "<input type='submit' value='Excluir'> </form>" .
                  "</td><td>" .
                   "<form action='" . $_SERVER["PHP_SELF"] . "' method='post'>" .
                 "<input type='hidden' name='id' value='" . $us["id"] . "'>" . "<input type='hidden' name='nome' value='" . $us["nm_nome"] . "'>" . "<input type='hidden' name='sobrenome' value='" . $us["nm_sobrenome"] . "'>" .
                 "<input type='hidden' name='idade' value=" . $us["vl_idade"] . ">" . "<input type='hidden' name='edit' value='sim'>" .
                   "<input type='submit' value='Editar'> </form></td></tr>";
        }
        ?>
    </table>
    
</main>
    
</body>
</html>