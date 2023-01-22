<?php
namespace Kodedrop\reCaptchaV2;
use Kodedrop\reCaptchaV2\Controller;
class reCaptchaV2 extends Controller
{
    public static function Script(): string
    {
        return '   <script src="https://www.google.com/recaptcha/api.js" async defer></script>';
    }
    public static function Create($ResponseKey, $class = "", $style = ""): string
    {
        return (new self)->Render($ResponseKey, $class, $style);
    }
    public static function Verify($Response, $SecretKey): string
    {
        return (new self)->Validate($Response, $SecretKey);
    }
}
