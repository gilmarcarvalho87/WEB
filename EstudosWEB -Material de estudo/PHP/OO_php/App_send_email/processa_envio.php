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
    public  $status=['codigo_status'=> null,'descricao_status'=> null]; 


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
        header('location:index.php'); 
        
        }
   }
}

  //instancia, captacao de dados do front
  $ObjMensagem = new Mensagem(); 
  $ObjMensagem ->__set('para',$_POST['para']);
  $ObjMensagem ->__set('assunto',$_POST['assunto']);
  $ObjMensagem ->__set('mensagem',$_POST['mensagem']); 
  $ObjMensagem ->validar();
 
 



/////////////////////////////////////////////

  //Phpmailer 
  $mail = new PHPMailer(true);
  try {
     //Server settings
    $mail->SMTPDebug =false;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'gilmarpcarvalho@gmail.com';                     //SMTP username
    $mail->Password   = 'wnxo hkzw xnsj blea';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //remetente
    $mail->setFrom($ObjMensagem->__get('para'));
        //destinatario
    $mail->addAddress($ObjMensagem->__get('para'));     //Add a recipient
      //email de retorno da resposta padrao 
    //$mail->addReplyTo('info@example.com', 'Information');
      //replica o email como copia para estes
    //$mail->addCC($ObjMensagem->__get('copia')); //nao terá copia 
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
      $ObjMensagem->status['codigo_status']=1;
      $ObjMensagem->status['descricao_status']='Email enviado com sucesso';
    
  } catch (Exception $e) {
    $ObjMensagem->status['codigo_status']=2;
    $ObjMensagem->status['descricao_status']='Erro no envio';
      
    } 

      
      
  ?>
<!-------------------------------------------------->
<html>
    <head>
      <meta charset="utf-8" />
        <title>App Mail Send</title>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
    </head>
    <body>
    <div class="container">  
      <div class="py-3 text-center">
        <img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
        <h2>Send Mail</h2>
        <p class="lead">Seu app de envio de e-mails particular!</p>
      </div>
    <div class="row">
      <div class="col-md-12">
      <?php if ($ObjMensagem->status['codigo_status'] == 1) { ?>
          <div class="container">
            <H1 class="display-4 text-center text-success" ><?=$ObjMensagem->status['descricao_status']?></H1>
          </div>
          </BR>
          <a class="btn btn-success" href="index.php">Voltar</a>
      <?php }?>
      <?php if ($ObjMensagem->status['codigo_status'] == 2) { ?>
          <div class="container">
            <H1 class="display-4 text-center text-danger"><?=$ObjMensagem->status['descricao_status']?></H1>
          </div>
          </BR>
          <a class="btn btn-danger" href="index.php">Voltar</a>
      <?php }?>
              
      </div>
    </div>
 



  </body>
  </html>
  