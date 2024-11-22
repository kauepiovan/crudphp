
<?php
    session_start();

    if (!isset($_SESSION['email'])) {
        header("Location: index.php");
        exit();
    }

    include 'produtos_controller.php';

    $produtos = getProdutos();
    $produtosToEdit = null;

    if (isset($_GET['edit'])) {
        $userToEdit = getProduto($_GET['edit']);
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Produtos</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function clearForm() {
            document.getElementById('nome').value = '';
            document.getElementById('descricao').value = '';
            document.getElementById('marca').value = '';
            document.getElementById('modelo').value = '';
            document.getElementById('valorunitario').value = '';
            document.getElementById('categoria').value = '';
            document.getElementById('url_img').value = '';
            document.getElementById('ativo').value = '';
            document.getElementById('id').value = '';
        }
    </script>
</head>
<body>
    <?php include 'header.php';?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Cadastro de Produtos</h2>

        <form method="POST" action="" class="border p-4 bg-light rounded">
            <input type="hidden" id="id" name="id" value="<?php echo $produtoToEdit['id'] ?? ''; ?>">

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $userToEdit['nome'] ?? ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="descricao">descricao:</label>
                <textarea id="descricao" name="descricao" required></textarea>
            </div>

            <div class="form-group">
                <label for="marca">marca:</label>
                <input type="text" class="form-control" id="marca" name="marca" value="<?php echo $userToEdit['marca'] ?? ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="modelo">modelo:</label>
                <input type="text" class="form-control" id="modelo" name="modelo" required>
            </div>

            <div class="form-group">
                <label for="valorunitario">valor unitario:</label>
                <input type="decimal" class="form-control" id="valorunitario" name="valorunitario" required>
            </div>

            <div class="form-group">
                <label for="categoria">categoria:</label>
                <input type="text" class="form-control" id="categoria" name="categoria" required>
            </div>

            <div class="form-group">
                <label for="url_img">url img:</label>
                <input type="text" class="form-control" id="url_img" name="url_img" required>
            </div>

            <div class="form-group">
                <label for="ativo">Ativo:</label><br>
                <select id="ativo" name="ativo">
                    <option value="1" selected>Sim</option>
                    <option value="0">Não</option>
                </select>
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
                    <th>Descricao</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Valor Unitario</th>
                    <th>Categoria</th>
                    <th>Imagem</th>
                    <th>Ativo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><?php echo $produto['id']; ?></td>
                        <td><?php echo $produto['nome']; ?></td>
                        <td><?php echo $produto['descricao']; ?></td>
                        <td><?php echo $produto['marca']; ?></td>
                        <td><?php echo $produto['modelo']; ?></td>
                        <td><?php echo $produto['valorUnitario']; ?></td>
                        <td><?php echo $produto['categoria']; ?></td>
                        <td><img src="<?php echo $produto['url_img']; ?>" alt="" style="width: 100px; height: auto;"></td>
                        <td><?php echo $produto['ativo']; ?></td>
                        <td>
                            <a href="?edit=<?php echo $produto['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="?delete=<?php echo $produto['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
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
