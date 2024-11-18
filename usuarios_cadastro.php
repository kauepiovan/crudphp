
<?php
    session_start();
    
    if (!isset($_SESSION['email'])) {
        header("Location: index.php");
        exit();
    }

    include 'usuarios_controller.php';

    $users = getUsers();
    $userToEdit = null;

    if (isset($_GET['edit'])) {
        $userToEdit = getUser($_GET['edit']);
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Usuários</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function clearForm() {
            document.getElementById('nome').value = '';
            document.getElementById('telefone').value = '';
            document.getElementById('email').value = '';
            document.getElementById('senha').value = '';
            document.getElementById('id').value = '';
        }
    </script>
</head>
<body>
    <?php include 'header.php';?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Cadastro de Usuários</h2>
        
        <form method="POST" action="" class="border p-4 bg-light rounded">
            <input type="hidden" id="id" name="id" value="<?php echo $userToEdit['id'] ?? ''; ?>">
            
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $userToEdit['nome'] ?? ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $userToEdit['telefone'] ?? ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $userToEdit['email'] ?? ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            
            <button type="submit" name="save" class="btn btn-primary">Salvar</button>
            <button type="submit" name="update" class="btn btn-success">Atualizar</button>
            <button type="button" class="btn btn-secondary" onclick="clearForm()">Novo</button>
        </form>

        <h2 class="text-center mt-5">Usuários Cadastrados</h2>

        <table class="table table-striped table-bordered mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['nome']; ?></td>
                        <td><?php echo $user['telefone']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td>
                            <a href="?edit=<?php echo $user['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="?delete=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php include 'footer.php';?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
