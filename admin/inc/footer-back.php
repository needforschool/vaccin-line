
  </div>
  <!-- End of Main Content -->

  <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Vaccin'Line 2020</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Prêt a se deconnecter ?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Selectionner "Se deconnecter" vous deconnectera de votre session</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
            <a class="btn btn-primary" href="../logout.php">Se deconnecter</a>
        </div>
    </div>
    </div>
    </div>

    <!-- Delete Modal-->

    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Voulez vous vraiment supprimer cet utilisateur ?
            </div>
            <div class="modal-body">
                Si vous supprimez cet utilisateur, vous perdrez toutes les données lié à cet utilisateur
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <a href="delete-user.php?id=<?php if (!empty($id)) { echo $id;} ?>" class="btn btn-danger btn-ok">Supprimer</a>
            </div>
        </div>
    </div>

    <script src="vendor\bootstrap\js\bootstrap.bundle.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor\datatables\jquery.dataTables.min.js"></script>
    <script src="vendor\datatables\dataTables.bootstrap4.min.js"></script>

    <!-- Call the dataTables jQuery plugin -->
      <script>$(document).ready(function() {
        $('#dataTable').DataTable();
      });
    </script>

  </body>

</html>
