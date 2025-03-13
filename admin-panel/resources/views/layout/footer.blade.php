


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
    </script>


    @if (session('success'))
        <script>
            Toast.fire({
            icon: "success",
            title: "{{ session('success') }}"
            });
        </script>
    @elseif(session('error'))
        <script>
            Toast.fire({
            icon: "error",
            title: "{{ session('error') }}"
            });
        </script>

    @endif


    @yield('script')

</body>

</html>
