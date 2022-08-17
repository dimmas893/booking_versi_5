    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>
    
    @yield('javascript')
        <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>

      <script src="{{ asset('swal/dist/sweetalert2.min.js') }}"></script>

  @if(session('tambah'))
    <script type="text/javascript">
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Data berhasil ditambah',
          showConfirmButton: false,
          timer: 2000
        })
    </script>
  @endif

  @if(session('edit'))
    <script type="text/javascript">
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Data berhasil diedit',
          showConfirmButton: false,
          timer: 2000
        })
    </script>
  @endif

  @if(session('delete'))
    <script type="text/javascript">
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Data berhasil didelete',
          showConfirmButton: false,
          timer: 2000
        })
    </script>
  @endif

    @if(session('errorboking'))
    <script type="text/javascript">
        Swal.fire({
          position: 'top-end',
          icon: 'error',
          title: 'Maaf Kamar sudah penuh',
          showConfirmButton: false,
          timer: 2000
        })
    </script>
  @endif

      @if(session('bookingberhasil'))
    <script type="text/javascript">
        Swal.fire({
          position: 'top-end',
          icon: 'error',
          title: 'Boking berhasil',
          showConfirmButton: false,
          timer: 2000
        })
    </script>
  @endif

