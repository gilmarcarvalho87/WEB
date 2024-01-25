<?php

  require './bibliotecas/PHPMailer/Exception.php';
  require './bibliotecas/PHPMailer/DSNConfigurator.php';
  require './bibliotecas/PHPMailer/OAuthTokenProvider.php';
  require './bibliotecas/PHPMailer/PHPMailer.php';
  require './bibliotecas/PHPMailer/POP3.php';
  require './bibliotecas/PHPMailer/SMTP.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
 

class Mensagem{
    //atributos
    private $para=null;
    private $assunto=null;
    private $mensagem=null;
    private $copia=null;
  
  


    //funcoes magicas
    function __get($atributo){
      return $this-> $atributo;
    }
    function __set($atributo,$valor){
      $this-> $atributo = $valor;
    }    
    function validar(){
     if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)){   
        echo'falta preencher campos';    
        }

    }

    }
 
  //instancia, captacao de dados do front
  $ObjMensagem = new Mensagem(); 
  $ObjMensagem ->__set('para',$_POST['para']);
  $ObjMensagem ->__set('assunto',$_POST['assunto']);
  $ObjMensagem ->__set('copia',$_POST['copia']);
  $ObjMensagem ->__set('mensagem',$_POST['mensagem']);
 
  $ObjMensagem ->validar();
 
 





    //Phpmailer 
  $mail = new PHPMailer(true);
  try {
  //Server settings
    $mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'gilmarpcarvalho@gmail.com';                     //SMTP username
    $mail->Password   = 'wnxo hkzw xnsj blea';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //remetente
    $mail->setFrom('gilmarpcarvalho@gmail.com','Gilmar Carvalho');
        //destinatario
    $mail->addAddress($ObjMensagem->__get('para'));     //Add a recipient
      //email de retorno da resposta padrao 
  //$mail->addReplyTo('info@example.com', 'Information');
      //replica o email como copia para estes
    $mail->addCC($ObjMensagem->__get('copia')); //nao terá copia 
    //$mail->addBCC('gilmarpcarvalho@gmail.com');

      //Anexos add
  // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
  // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $ObjMensagem->__get('assunto');
    $mail->Body    = $ObjMensagem->__get('mensagem');
  // $mail->AltBody = 'Juba the Best';

    $mail->send();
    echo 'E-mail enviado com sucesso !!!';
  } catch (Exception $e) {
      echo "ERRO NO ENVIO: {$mail->ErrorInfo}";
} 
  

  

    
            
      
       


  



















?>