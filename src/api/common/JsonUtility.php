<?php

namespace common;

class JsonUtility {

   public function SendJson(int $status, $payload) : void {
       http_response_code($status);
       $json = json_encode($payload, JSON_UNESCAPED_UNICODE);

       // Discard any accidental output before sending the JSON
       $noise = ob_get_clean();
       if ($noise !== '') {
           error_log('mysql.php stray output suppressed: ' . $noise);
       }

       echo $json;
       exit;
   }
}