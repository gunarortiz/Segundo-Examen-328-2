 <?php
 class ListarModel extends CI_Model {
    public $id;
    public $nombre;
    public $email;
    
    public function __construct(){
        // $url = 'localhost:8080/usuarios/';
    }
    public function callAPI($method, $url, $data){
   $curl = curl_init();
   switch ($method){
      case "POST":
         curl_setopt($curl, CURLOPT_POST, 1);
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         break;
      case "PUT":
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
         break;
      default:
         
         if ($data)
            $url = sprintf("%s?%s", $url, http_build_query($data));
   }
   curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
   ));

   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   // EXECUTE:
   $result = curl_exec($curl);
   
   if(!$result){die("Connection Failure");}
   curl_close($curl);
   return $result;
}
    public function getAll(){
        $get_data = $this->callAPI('GET', 'localhost:8080/usuarios', false);
        $response = json_decode($get_data, false);
        return $response;
    }


  }

?>