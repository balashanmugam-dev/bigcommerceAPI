<?php

namespace Balashanmugam\Api;

class Bigcommerce {
	public function callBigcommerceAPI($url,$access_token,$method,$fields){
		$curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => $this->getRequiredHeaders($access_token),
            CURLOPT_POSTFIELDS => $fields
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
	}

	public function getRequiredHeaders($access_token){
		return [
            "Content-Type: application/json",
            "X-Auth-Token: ".$access_token
        ];
	}
}

?>