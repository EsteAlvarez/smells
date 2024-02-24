    <footer class="container-fluid p-5 mt-5">
        <div class="d-flex flex-wrap justify-content-between align-items-center container">
            <div class="col-md-4 d-flex flex-column">
                <h3 class="mb-3 text-light">Smells</h3>
                <span class="mb-3 text-light">&copy; Copyright 2023</span>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.eliminar').click(function() {
                return confirm('¿Estas seguro de eliminar?');
            });
        });
    </script>
</body>
</html>