<?php
include('inc/header.php');
if(!isset($_SESSION['userLoginStatus'])){
  header("Location:?logout=1");
}
?>

<section class="vh-100 gradient-custom">
  
  <div class="container-fluid py-3 h-100">
  <a href="./" class="btn btn-primary btn-sm">VOLTAR</a>
 
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-12 col-xl-12">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">USUÁRIO</h3>
            <form method="post" action="">
              <input type="hidden" name="register-user" value="1">
              <div class="row">
                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                  <label class="form-label" for="firstName">NOME</label>
                  <input type="text" name="nome" class="form-control form-control-lg"  value="" placeholder="Digite o nome:"/ REQUIRED>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <label class="form-label" for="lastName">CPF</label>
                  <input type="text" name="cpf" class="form-control form-control-lg" placeholder="Digite o cpf:"/ REQUIRED>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <label class="form-label" for="lastName">RG</label>
                  <input type="text" name="rg" class="form-control form-control-lg"  placeholder="Digite o rg:"/ REQUIRED>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <label class="form-label" for="lastName">DATA DE NASC.</label>
                  <input type="text" name="data_nascimento" class="form-control form-control-lg"  placeholder="Digite a data:"/ REQUIRED>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <label class="form-label" for="lastName">TELEFONE</label>
                  <input type="text" name="telefone" class="form-control form-control-lg"  placeholder="Digite o telefone:"/ REQUIRED>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  <label class="form-label" for="firstName">ENDEREÇO</label>
                  <input type="text" name="endereco" class="form-control form-control-lg" placeholder="Digite o endereço:"/ REQUIRED>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <label class="form-label" for="lastName">CEP</label>
                  <input type="text" name="cep" class="form-control form-control-lg" placeholder="Digite o cep:"/ REQUIRED>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <label class="form-label" for="lastName">UF</label>
                  <input type="text" name="uf" class="form-control form-control-lg"  placeholder="Digite o uf:"/ REQUIRED>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <div class="form-outline">
                  <label class="form-label" for="lastName">NÚMERO</label>
                  <input type="text" name="numero" class="form-control form-control-lg"  placeholder="Digite o número:"/ REQUIRED>
                  </div>
                </div>
              </div>

              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" value="SALVAR" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include('inc/footer.php');
?>