<footer class="bg-dark text-white d-flex align-items-center" style="height: 2cm;">
        <div class="container text-center">
            <p calss="mb-0">Voce esta logado como <?php echo htmlspecialchars($_SESSION['nome'])?></p>
            <p class="mb-0">&copy; <?php echo date("Y"); ?> Kaue Piovan. Todos os direitos reservados.</p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>