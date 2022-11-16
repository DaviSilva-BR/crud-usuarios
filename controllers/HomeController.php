<?php
// session_start();

class HomeController{
    public $model;

    public function indexAction(){

        if(isset($_GET['logout'])){
            unset($_SESSION['userLoginStatus']);
        }
        if(isset($_POST['LoginSubmit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $checkUserLogin = $this->model->CheckUserLogin($username,md5($password));
            if($checkUserLogin ==1){
                
                $_SESSION['userLoginStatus'] =1;
                
            }
        }

        if(isset($_POST['RegisterSubmit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $this->model->LoginRegister($username, md5($password));
            $this->model->List();
            $_SESSION['userLoginStatus'] =1;
        }

        if(isset($_POST['register-user'])){

            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $rg = $_POST['rg'];
            $data_nascimento = $_POST['data_nascimento'];
            $telefone = $_POST['telefone'];
            $endereco = $_POST['endereco'];
            $cep = $_POST['cep'];
            $uf = $_POST['uf'];
            $numero = $_POST['numero'];
            $checkRegister =  $this->model->register_user($nome,$cpf,$rg,$data_nascimento,$telefone,$endereco,$cep,$uf,$numero);

            if($checkRegister ==1){
                
                return require_once('views/dashboard.php');
                
            }
        }

        if(isset($_POST['update-user'])){
            
            $pessoa_id = $_POST['pessoa_id'];
            $endereco_id = $_POST['endereco_id'];
            $estado_id = $_POST['estado_id'];
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $rg = $_POST['rg'];
            $data_nascimento = $_POST['data_nascimento'];
            $telefone = $_POST['telefone'];
            $endereco = $_POST['endereco'];
            $cep = $_POST['cep'];
            $uf = $_POST['uf'];
            $numero = $_POST['numero'];
            $checkRegister =  $this->model->update_user($pessoa_id,$endereco_id,$estado_id,$nome,$cpf,$rg,$data_nascimento,$telefone,$endereco,$cep,$uf,$numero);

            if($checkRegister ==1){
                
                return require_once('views/dashboard.php');
                
            }
        }

        if( isset($_GET['view'])) {
            $id = $_GET['id'];
            $button ='hidden';
            $block ='disabled=""';

            $this->model->Show($id,$button,$block);
                return require_once('views/user.php');
        }

        if(isset($_GET['edit'])) {
            $id = $_GET['id'];
            $button ='submit';
            $block ='';

            $this->model->Show($id,$button,$block);;
                return require_once('views/user.php');
        }

        $this->routeManager();
    }


    public function routeManager(){

        if(isset($_GET['estado_id'])){
            $pessoa_id = $_GET['pessoa_id'];
            $estado_id = $_GET['estado_id'];

            $this->model->delete($estado_id,$pessoa_id);

        }
        
        if( isset($_GET['register-user'])) {
            return require_once('views/register-user.php');
        }

        if(isset($_SESSION['userLoginStatus'])){
            return require_once('views/dashboard.php');
        }

        if(isset($_GET['register'])){
            return require_once('views/register.php');
        }

        if(isset($_GET['login']) || isset($_GET['logout'])){
            return require_once('views/login.php');
        }

        return require_once('views/login.php');
    }
}