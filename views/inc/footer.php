<footer class="bg-light text-center text-lg-start" style="position: fixed; bottom:0px; width:100%;">
  <!-- Copyright -->
  <div class="text-center p-3 bg-light">
    © <?php echo date("Y")?> Copyright Webdec - desenvolvido por:
    <a class="text-dark" href="https://dev.davigabriel.com.br" target="_blank"><b>Davi S.</b></a>
  </div>
  <!-- Copyright -->
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script>
    $(document).ready( function () {
    $('#myTable').dataTable( {
        "pageLength": 8
    } );
} );

  </script>

</body>

</html>