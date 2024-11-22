<?php
    include 'db.php';

    function saveProduto($nome, $descricao, $marca, $modelo, $valorUnitario, $categoria, $url_img, $ativo) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO produtos (nome, descricao, marca, modelo, valorunitario, categoria, url_img, ativo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssdssi", $nome, $descricao, $marca, $modelo, $valorUnitario, $categoria, $url_img, $ativo);
        return $stmt->execute();
    }

    function getProdutos() {
        global $conn;
        $result = $conn->query("SELECT * FROM produtos");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function getProduto($id) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM produtos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    function updateProduto($id, $nome, $descricao, $marca, $modelo, $valorUnitario, $categoria, $url_img, $ativo) {
        global $conn;
        $stmt = $conn->prepare("UPDATE produtos SET nome = ?, descricao = ?, marca = ?, modelo = ?, valorunitario = ?, categoria = ?, url_img = ?, ativo = ? WHERE id = ?");
        $stmt->bind_param("ssssdssii", $nome, $descricao, $marca, $modelo, $valorUnitario, $categoria, $url_img, $ativo, $id);
        return $stmt->execute();
    }

    function deleteProduto($id) {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM produtos WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Processamento do formulário
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['save'])) {
            saveProduto($_POST['nome'], $_POST['descricao'], $_POST['marca'], $_POST['modelo'], $_POST['valorunitario'], $_POST['categoria'], $_POST['url_img'], $_POST['ativo']);
        } elseif (isset($_POST['update'])) {
            updateProduto($_POST['id'], $_POST['nome'], $_POST['descricao'], $_POST['marca'], $_POST['modelo'], $_POST['valorunitario'], $_POST['categoria'], $_POST['url_img'], $_POST['ativo']);
        }
    }

    // Processamento da exclusão
    if (isset($_GET['delete'])) {
        deleteProduto($_GET['delete']);
    }
?>
