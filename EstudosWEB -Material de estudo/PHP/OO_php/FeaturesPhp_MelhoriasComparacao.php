<?php                                                               //prova real
                                                                    //PHP7   PHP8      
      echo '0 é igual a "0" Resp:  '  .(0 == "0");                  //true   true  
        echo'<br>';                                                 
      echo '0 é igual a "0.0" Resp:  '  .(0 == "0.0");               //true   true  
        echo'<br>';
      echo '0 é igual a "teste" Resp:  '  .(0 == "teste");           //true   false  
        echo'<br>';
      echo '0 é igual a "" Resp:  '  .(0 == "");                     //true   false  
        echo'<br>';
      echo '50 é igual a "    50" Resp:  '  .(50 == "     50");       //true   true      
        echo'<br>';
      echo '50 é igual a "50teste" Resp:  '  .(50 == "50teste");       //true  false  
        echo'<br>';

?>  
