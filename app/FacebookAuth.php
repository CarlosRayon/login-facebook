
<?php

class FacebookAuth
{

    protected $fb;
    protected $fbUrl = 'http://localhost/login-facebook/callback_facebook.php';

    public function __construct(Facebook\Facebook $facebook)
    {
        $this->fb = $facebook;
    }

    public function getHelper()
    {
        return $this->fb->getRedirectLoginHelper();
    }

    public function getAuthUrl()
    {
        return $this->getHelper()->getLoginUrl($this->fbUrl, array('email'));
    }

    public function isLogin()
    {
        return isset($_SESSION['id_facebook']);
    }

    public function login()
    {
        try {

            $response = $this->fb->get('/me?fields=id,name,picture,email', $this->getHelper()->getAccessToken());

            $usuario = $response->getGraphUser();

            //Veo datos que obtengo
            // echo '<pre>';
            // var_dump($usuario);
            $datosUsuario = array();
            foreach ($usuario as $item) {
                // echo '<pre>';
                // var_dump($item);
                array_push($datosUsuario, $item);
            }
            var_dump($datosUsuario);

            die();

            //Captura datos del usuario
            $_SESSION['perfil_facebook'] = $usuario->getId();
            return true;

        } catch (\Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        return false;
    }

    public function signOut()
    {
        unset($_SESSION['perfil_facebook']);
    }

}

?>