<?php
defined('CONTROL') or die('<h1>Acesso Inválido</h1>');



class ApiConsumer
{

    private function api($endpoint,$method='GET',$post_fields=[]){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://restcountries.com/v3.1/'.$endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => FALSE,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
        ));

        $response = curl_exec($curl);
        $err=curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo"Erro no cUrl".$err;
            die(0);
        }else{ 
       return json_decode($response,true);
        }
    }

    //pega todos os paises
    public function get_all_countries(){

        $results= $this->api('all');
        $countries=[];
        foreach ($results as $result) {
            $countries[]=$result['name']['common'];
        }
        sort($countries);
        return $countries;
    
    
    }
    //pega um determinado país
    public function get_country($country_name){
        return $this->api('name/'.$country_name);
    }



}
