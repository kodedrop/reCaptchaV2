# Kodedrop/recaptchav2

Google RecaptchaV2 checkbox

# Install with composer

To install with [Composer](https://getcomposer.org/), simply require the
latest version of this package.

```bash
composer require kodedrop/recaptchav2
```
## Create And Verify

```php
include_once('./vendor/autoload.php');
use Kodedrop\reCaptchaV2\reCaptchaV2;


# insert in html head area 

 <?php echo reCaptchaV2::Script(); ?>

# Add This Code Which Place you Will Show reCaptcha.

<?php 
echo reCaptchaV2::Create('SiteKey');  //reCaptcha site key and seckey here
?>  

# Verify reCaptchaV2

if (isset($_POST['signup'])) { //FormSubmit
    $recaptchaResponse = $_POST['g-recaptcha-response']; //g-recaptcha-response Method GET = $_GET Or POST = $_POST
    $secKey = "SECREAT KEY"; //https://www.google.com/recaptcha/admin/create reCaptcha site key and seckey here
    if(reCaptchaV2::Verify($recaptchaResponse,$secKey)){
        //Next Code
    }
    else{
        echo "Please Fil Recaptcha"; //Throw Error
    }

}
```
## Customize reCaptchaV2
```php
reCaptchaV2::Create('SiteKey','class','styles');

//class And styles optional parameter

//add class like 

reCaptchaV2::Create('SiteKey','mb-5 bg-danger'); //bs5-classess and also use custom classes

//add style like 
reCaptchaV2::Create('SiteKey','','border:1px solid #333;background-color:#fff;');
```
## Generate Site Key And Secret Key
![Image of Generate Site Key And Secret Key](https://developers.google.com/static/recaptcha/images/settings.png)
## License

[MIT](https://choosealicense.com/licenses/mit/)
