<?php
    defined('CONTROL') or die('<h1>Acesso Inválido</h1>');

//get all countries data
$api = new ApiConsumer();
    $countries = $api->get_all_countries();
   
     
 

?>


<div class="container mt-5">
    <div class="row">
        <div class="col text-center">
            <h3>Paises do mundo</h3>
            <hr>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-4 ">
            <p class="d-flex justify-content-center">Lista de Paises</p>
            <select class="form-select" name="country" id="select_country">
                <option value="" >Selecione um país</option>
                <?php foreach($countries as $country) : ?>
                    
                    <option value="<?=$country?>"><?=$country?></option>     
                
                <?php endforeach;?>
            </select>
        </div>
    </div>





</div>
<script>
        document.addEventListener('DOMContentLoaded',  ()=>{
            const select_country= document.querySelector("#select_country")
                  select_country.addEventListener('change',  ()=> {
                     const country = select_country.value
                     console.log(country)


                  });

        })



</script>


   
