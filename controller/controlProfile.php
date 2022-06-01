<?php

//MODEL
include_once('model/modelGrafico.php');
include_once('model/modelLogin.php');
include_once('model/modelAseets.php');

//UTILS
include_once('utils/modelMensaje.php');
include_once('utils/modelSession.php');

//DATOS
include_once('data/usuario.php');



class ControlProfile
{

    public $MODELOGRAFICO;
    public $MSG;
    public $MODELOGIN;
    public $ASSETS;
    public $SESSION;


    public function __construct()
    {
        $this->MODELOGRAFICO = new ModeloGrafico;
        $this->MSG = new ModeloMensaje();
        $this->MODELOGIN = new ModeloLogin();
        $this->ASSETS = new ModeloAssets();
        $this->SESSION = new ModeloSession();
    }


    public function ProfileJefe()
    {
        try {
            //VER LA SESSION INICIADA  
            $this->SESSION->isSession();

            $titulo = "Profile";

            //color de links
            if (isset($_REQUEST['ruta']) == 'ProfileJefe') {
                $ruta = 'ProfileJefe';
            }

            include_once('view/jefe/profile/profile.php');
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }


    public function ProfileCoordinador()
    {
        try {
            //VER LA SESSION INICIADA  
            $this->SESSION->isSession();

            $titulo = "ProfileCoordinador";

            //color de links
            if (isset($_REQUEST['ruta']) == 'ProfileCoordinador') {
                $ruta = 'ProfileCoordinador';
            }

            include_once('view/coordinador/profile/profile.php');
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function update()
    {
        try {
            //VER LA SESSION INICIADA  
            $this->SESSION->isSession();

            if (isset($_REQUEST['btn-update-profile'])) {
                $usuario = new Usuario();
                $usuario->setid_user($_SESSION['id_usuario']);
                $dataUsuario = $this->MODELOGIN->logeoById($usuario);

                if (basename($_FILES['file']['name'] == '')) {
                    $usuario->setnombreUser($this->ASSETS->CLEAR($_POST['txt_usuario']));
                    $usuario->setcontraUser($this->ASSETS->CLEAR($_POST['txt_pass']));
                    $usuario->setperfil($this->ASSETS->CLEAR($_POST['txt_perfil']));
                    $usuario->setarea($this->ASSETS->CLEAR($_POST['txt_area']));
                    $usuario->setfoto($dataUsuario->foto);
                    $usuario->setid_user($this->ASSETS->CLEAR($dataUsuario->id_usuario));
                } else {
                    $directorio = "image/";
                    $ruta = $directorio . basename($_FILES['file']['name']);
                    move_uploaded_file($_FILES['file']['tmp_name'], $ruta);
                    $usuario->setid_user($this->ASSETS->CLEAR($_SESSION['id_usuario']));
                    $usuario->setnombreUser($this->ASSETS->CLEAR($_POST['txt_usuario']));
                    $usuario->setcontraUser($this->ASSETS->CLEAR($_POST['txt_pass']));
                    $usuario->setperfil($this->ASSETS->CLEAR($_POST['txt_perfil']));
                    $usuario->setarea($this->ASSETS->CLEAR($_POST['txt_area']));
                    $usuario->setfoto($ruta);
                    //unlink($dataUsuario->foto);
                }

                $save = $this->MODELOGIN->updateLogin($usuario);

                if ($save) {
                    $_SESSION['CONTROL'] = 0;
                    $_SESSION['CONTROL'] = '';
                    $message = "SE ACTUALIZO CORRECTAMENTE TUS CREDENCIALES";
                    echo $this->MSG->success($message);
                    include_once('view/login/login.php');
                } else {
                    $_SESSION['CONTROL'] = 0;
                    $_SESSION['CONTROL'] = '';
                    $message = "SE ACTUALIZO CORRECTAMENTE TUS CREDENCIALES";
                    echo $this->MSG->success($message);
                    include_once('view/login/login.php');
                }
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
