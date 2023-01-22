<?php

namespace Kodedrop\reCaptchaV2;

class Controller
{
    private $SecreatKey; //your secreat key equired. The shared key between your site and reCAPTCHA.
    private $Response; //$_POST['g-recaptcha-response'] POST parameter when the user submits the form on your site
    private $UserIp; //The user's IP address.
    private $Validate = false;
    private $ResponseKey;
    public function Render($ResponseKey, $class, $style): string
    {
        $this->ResponseKey = $ResponseKey;
        return '<div class="g-recaptcha ' . $class . '" style="' . $style . '" data-sitekey="' . $this->ResponseKey . '"></div>';
    }
    public function Validate($Response, $SecreatKey): bool
    {
        $this->Response = $Response;
        $this->SecreatKey = $SecreatKey;
        $this->UserIp = $_SERVER['REMOTE_ADDR'];
        $GetResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$this->SecreatKey&response=$this->Response&remoteip=$this->UserIp");
        $GetResponse = json_decode($GetResponse);
        if ($GetResponse->success == true) {
            $this->Validate = true;
        }
        return $this->Validate;
    }
}
