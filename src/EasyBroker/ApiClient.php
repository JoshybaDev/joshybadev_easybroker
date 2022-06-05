<?php

namespace JoshybaDev\EasyBroker;

class ApiClient
{
    private $base_uri = "";
    private $headers = "";
    public function __construct($headers,$base_uri,$logger=null)
    {
        $this->base_uri = $base_uri;
        $this->headers = $headers;
    } 
    public function get($path,$params=false)
    {
        $resfinal = $this->fetchUrl('GET',$this->base_uri.$path,$params,$this->headers);
        return $resfinal["data"];   
    }
    public function post($path,$params=false)
    {
        $resfinal = $this->fetchUrl('POST',$this->base_uri.$path,$params,$this->headers);
        return $resfinal["data"];
    }
    public function put($path,$params=false)
    {
        $resfinal = $this->fetchUrl('POST',$this->base_uri.$path,$params,$this->headers);
        return $resfinal["data"];     
    }    
    public function delete($path,$params=false)
    {
        $resfinal = $this->fetchUrl('POST',$this->base_uri.$path,$params,$this->headers);
        return $resfinal["data"];
    }
    /** 
     *  Example de PostFields
     *  CURLOPT_POSTFIELDS => array
     * (
     *      'rutaimg' => curl_file_create($pathoffile, $_FILES['rutaimg']['type'], $nameImagen), 'usuario_id' => $usuario_id, 'token' => '47c74009bedff2c96eb4c273f7635d19186cdad2'
     * ), 
     * CURLOPT_CUSTOMREQUEST    POST/GET/PUT/DELETE       
     */
    function fetchUrl($method = 'POST', $uri, $parametrosArray , $headers = false)
    {
        $response = [];
        //Initialize curl
        $curl = curl_init();
        //headers default
        $headers = ($headers == false) ? ["Content-Type: multipart/form-data;"]: $headers;
        //Define options
        $CurlOptions=array(
            CURLOPT_CUSTOMREQUEST => $method, 
            CURLOPT_URL => $uri,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYPEER => false, /*ignora la validacion de ssl*/
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => $parametrosArray,
        );
        //Add options
        curl_setopt_array($curl,$CurlOptions );
        //Execute curl
        $result = curl_exec($curl);
        //Get Code
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        //if only errors
        if ($result === false) {
            $result .= curl_error($curl);
        }
        //Close
        curl_close($curl);
        //create array response
        $response["data"]=$result;
        $response["code"]=$httpcode;
        return $response;
    }
}
