<?php
include('inc/header.php');

if(!isset($_SESSION['userLoginStatus'])){
  header("Location:?logout=1");
}
?>

  <div class="container-fluid">
    <h2 class="text-center">Gestão de usuários</h2>
    <div class="row">
      <div class="container">
        <div class="btnAdd" style="float:right">
          <a href="?register-user=1" class="btn btn-primary btn-sm" style="margin-bottom: 20px;"><i class="bi bi-person-plus"></i> Adicionar</a>
        </div>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <table id="myTable" class="table display table-sm" style="width:100%">
              <thead>
                <th>Nome</th>
                <th>RG</th>  
                <th>CPF</th>
                <th>Data Nascimento</th>  
                <th></th>
              </thead>
              <tbody>
              <?php
                $this->model->List();
              ?>
              </tbody>
            </table>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
    </div>
  </div>

<?php
include('inc/footer.php');
?>


