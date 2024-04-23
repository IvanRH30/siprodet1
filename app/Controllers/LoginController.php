<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Services\LoginService;

class LoginController extends BaseController
{

    private $WebConfig;
    private $sesionInfo;
    //private $miVerificadorModel;

    function __construct()
    {
        $this->sesionInfo = new  LoginService();

    }
    public function login()
    {
        if (!session()->get('isLoggedIn')) {
            return view('Login/LoginView');
        }else{
            return view('Inicio/InicioView');
        }
    }
    public function autentificacion()
    {
        $metodo = $this->request->getMethod();
        if ($this->request->getMethod() == 'POST') 
        {
            $usuario = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            $respuestaAutenticacion = $this->sesionInfo->authenticate($usuario,$password);

            echo json_encode($respuestaAutenticacion,JSON_UNESCAPED_UNICODE);
            exit();
        }
    }    
    public function logout(){
        if($this->sesionInfo->logout())
        {
            return redirect()->to(base_url('/'));
        }
    }
    public function registrarUsuario()
    {
        $data['idUsuario'] = 0;
        return view('Login/RegistroView',$data);
    }
}
