<?php
class HomeModel{
    public $db;

    public function CheckUserLogin($username, $password){
        $query = "SELECT count(*) FROM tbl_user WHERE username='{$username}' AND password='{$password}'";
        $stmtp = $this->db->query($query);
        $row = $stmtp->fetch(PDO::FETCH_ASSOC);

        if($row['username']){
            return '1';
        }else{
            $error = '<div class="alert alert-danger text-center" role="alert">Erro - Consulte o desenvolvedor.</div>';
        }
    }

    public function LoginRegister($username, $password){
        $query = "INSERT INTO tbl_user (username, password) VALUES ('".$username."', '".$password."')";
        $smtp = $this->db->query($query);
        
        if($smtp){
            return 1;
        }else{
            $error = '<div class="alert alert-danger text-center" role="alert">Erro - Consulte o desenvolvedor.</div>';
        }
    }
    public function Show($id,$button,$block){

      $query = "SELECT *
      FROM estados AS est 
      INNER JOIN enderecos AS end ON end.estado_id = '$id'
      INNER JOIN pessoas AS pes  ON pes.endereco_id = end.id
      INNER JOIN telefones AS tel ON tel.pessoa_id = pes.id";
      $stmtp = $this->db->query($query);
      $row = $stmtp->fetch(PDO::FETCH_ASSOC);
        
        echo $form ='<section class="vh-100 gradient-custom">
  
        <div class="container-fluid py-3 h-100">
        <a href="./" class="btn btn-primary btn-sm">VOLTAR</a>

      
          <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-12 col-xl-12">
              <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">USUÁRIO</h3>
                  <form method="post" action="">
                    <input type="hidden" name="update-user" value="1" required>
                    <input type="hidden" name="pessoa_id" value="'.$row['pessoa_id'].'" required>
                    <input type="hidden" name="endereco_id" value="'.$row['endereco_id'].'" required>
                    <input type="hidden" name="estado_id" value="'.$row['estado_id'].'" required>
                    <div class="row">
                      <div class="col-md-4 mb-4">
                        <div class="form-outline">
                        <label class="form-label" for="firstName">NOME</label>
                        <input type="text" name="nome" '.$block.' class="form-control form-control-lg"  value="'.$row['nome'].'"  required/>
                        </div>
                      </div>
                      <div class="col-md-2 mb-4">
                        <div class="form-outline">
                        <label class="form-label" for="lastName">CPF</label>
                        <input type="text" name="cpf" '.$block.' class="form-control form-control-lg" value="'.$row['cpf'].'" required />
                        </div>
                      </div>
                      <div class="col-md-2 mb-4">
                        <div class="form-outline">
                        <label class="form-label" for="lastName">RG</label>
                        <input type="text" name="rg" '.$block.' class="form-control form-control-lg" value="'.$row['rg'].'" required />
                        </div>
                      </div>
                      <div class="col-md-2 mb-4">
                        <div class="form-outline">
                        <label class="form-label" for="lastName">DATA DE NASC.</label>
                        <input type="text" name="data_nascimento" '.$block.' class="form-control form-control-lg" value="'.$row['data_nascimento'].'" required/>
                        </div>
                      </div>
                      <div class="col-md-2 mb-4">
                        <div class="form-outline">
                        <label class="form-label" for="lastName">TELEFONE</label>
                        <input type="text" name="telefone" '.$block.' class="form-control form-control-lg"  value="'.$row['telefone'].'" required/>
                        </div>
                      </div>
                    </div>
      
                    <div class="row">
                      <div class="col-md-6 mb-4">
                        <div class="form-outline">
                        <label class="form-label" for="firstName">ENDEREÇO</label>
                        <input type="text" name="endereco" '.$block.' class="form-control form-control-lg" value="'.$row['endereco'].'" required />
                        </div>
                      </div>
                      <div class="col-md-2 mb-4">
                        <div class="form-outline">
                        <label class="form-label" for="lastName">CEP</label>
                        <input type="text" name="cep" '.$block.' class="form-control form-control-lg" value="'.$row['cep'].'"  required/>
                        </div>
                      </div>
                      <div class="col-md-2 mb-4">
                        <div class="form-outline">
                        <label class="form-label" for="lastName">UF</label>
                        <input type="text" name="uf" '.$block.' class="form-control form-control-lg" value="'.$row['uf'].'"   required/>
                        </div>
                      </div>
                      <div class="col-md-2 mb-4">
                        <div class="form-outline">
                        <label class="form-label" for="lastName">NÚMERO</label>
                        <input type="text" name="numero" '.$block.' class="form-control form-control-lg" value="'.$row['numero'].'" required/>
                        </div>
                      </div>
                    </div>
      
                    <div class="mt-4 pt-2">
                      <input class="btn btn-primary btn-lg" type="'.$button.'" value="SALVAR" />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>';
    }

    public function List(){
        $list ='';

          $query = "SELECT *
          FROM enderecos end INNER JOIN pessoas AS pes ON pes.endereco_id = end.id ORDER BY end.id ASC";
          $stmtp = $this->db->query($query);
          while($row = $stmtp->fetch(PDO::FETCH_ASSOC)){
            $list .= '<tr>';
              $list .= '<td>' . $row['nome'] .'</td>';
              $list .= '<td>' . $row['cpf'] .'</td>';
              $list .= '<td>' . $row['rg'] .'</td>';
              $list .= '<td>' . $row['data_nascimento'] .'</td>';
              $list .= '<td>
              <a href="?view=1&id=' . $row['estado_id'] .'" class="btn btn-info">Visualizar</a>
              <a href="?edit=1&id=' . $row['estado_id'] .'" class="btn btn-primary">Editar</a>
              <a data-bs-toggle="modal" data-bs-target="#delete' . $row['estado_id'] .'" class="btn btn-danger">Remover</a>

          </td>';
          $list .= '</tr>
          <div class="modal fade" id="delete' . $row['estado_id'] .'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header bg-danger">
                      <h5 class="modal-title text-white" id="exampleModalLabel">REMOVER REGISTRO</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <div class="alert alert-warning text-center" role="alert">TEM CERTEZA QUE DESEJA REMOVER?</span>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <a  href="index.php?estado_id=' . $row['estado_id'] .'&pessoa_id=' . $row['id'] .'
                      
                      " type="button" class="btn btn-primary">Confirmar</a>
                  </div>
              </div>
          </div>';
      }


  
        echo $list;
        
    }
    public function register_user($nome,$cpf,$rg,$data_nascimento,$telefone,$endereco,$cep,$uf,$numero){
       $error = '<div class="alert alert-danger text-center" role="alert">Erro - Consulte o desenvolvedor.</div>';
       $success = '<div class="alert alert-primary text-center" role="alert">Sucesso ao cadastrar</div>';
        $query = "INSERT INTO estados (uf) VALUES ('".$uf."')";
        if($smtp = $this->db->query($query)){

            $estado_id = $this->db->lastInsertId();

            $query = "INSERT INTO enderecos (estado_id, cep, endereco, numero) VALUES  ('".$estado_id."', '".$cep."', '".$endereco."', '".$numero."')";
            if($smtp = $this->db->query($query)){
                
                $endereco_id = $this->db->lastInsertId();

                $query = "INSERT INTO pessoas (endereco_id, nome, cpf, rg, data_nascimento, data_cadastro) VALUES ('".$endereco_id."', '".$nome."', '".$cpf."', '".$rg."', '".$data_nascimento."', NOW())";
                
                if($smtp = $this->db->query($query)){
                    $pessoa_id = $this->db->lastInsertId();

                    $query = "INSERT INTO telefones (pessoa_id, telefone) VALUES ('".$pessoa_id."', '".$telefone."')";
                    if($smtp = $this->db->query($query)){

                    }else{
                        echo $error;
                    }
                }else{
                    echo $error;
                }
            }else{
                echo $error;
            }

            echo $success;

        }else{
            echo $error;
        }

        return 1;
    }

    public function update_user($pessoa_id,$endereco_id,$estado_id,$nome,$cpf,$rg,$data_nascimento,$telefone,$endereco,$cep,$uf,$numero){
        $error = '<div class="alert alert-danger text-center" role="alert">Erro - Consulte o desenvolvedor.</div>';
        $success = '<div class="alert alert-primary text-center" role="alert">Sucesso ao Alterar</div>';
         $query = "UPDATE estados set uf='$uf' WHERE id='$estado_id'";
         if($smtp = $this->db->query($query)){
  
             $query = "UPDATE enderecos SET cep='$cep', endereco='$endereco', numero='$numero' WHERE id='$endereco_id'";
             if($smtp = $this->db->query($query)){
                  
                 $query = "UPDATE pessoas SET nome='$nome', cpf='$cpf', rg='$rg', data_nascimento='$data_nascimento', data_atualizacao=NOW() WHERE id='$pessoa_id'";
                 
                 if($smtp = $this->db->query($query)){

                     $query = "UPDATE telefones SET telefone='$telefone' WHERE pessoa_id='$pessoa_id'";
                     if($smtp = $this->db->query($query)){
 
                     }else{
                         echo $error;
                     }
                 }else{
                     echo $error;
                 }
             }else{
                 echo $error;
             }
 
             echo $success;
 
         }else{
             echo $error;
         }
 
         return 1;
     }

     public function delete($estado_id,$pessoa_id){
        $error = '<div class="alert alert-danger text-center" role="alert">Erro - Consulte o desenvolvedor.</div>';
        $success = '<div class="alert alert-primary text-center" role="alert">Sucesso ao Remover</div>';
        
        
        $query = "DELETE FROM estados WHERE id='$estado_id'";
         if($smtp = $this->db->query($query)){
  
             $query = "DELETE FROM enderecos WHERE estado_id='$estado_id'";
             if($smtp = $this->db->query($query)){
                  
                 $query = "UPDATE pessoas SET data_exclusao=NOW() WHERE endereco_id='$pessoa_id'";
                 
                 if($smtp = $this->db->query($query)){

                     $query = "DELETE FROM telefones  WHERE pessoa_id='$pessoa_id'";
                     if($smtp = $this->db->query($query)){
 
                     }else{
                         echo $error;
                     }
                 }else{
                     echo $error;
                 }
             }else{
                 echo $error;
             }
 
             echo $success;
 
         }else{
             echo $error;
         }
 
         return 1;
     }
}