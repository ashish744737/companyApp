        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
        <script src="{{ asset('build/assets/js/my-login.js') }}"></script>
        @if(session('success'))
        <script>
            Swal.fire({
                position: "top-end",
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
        @endif

        @if(session('status'))
        <script>
            Swal.fire({
                position: "top-end",
                title: '{{ session('status') }}',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
        @endif

        @if(session('error'))
        <script>
            Swal.fire({
                position: "top-end",
                title: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
        @endif
    </body>
</html>

