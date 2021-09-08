<?php

namespace IbanApi;
/**
 * @description Official ibanapi.com PHP package.
 * @author ibanapi.com
 * @since 8/09/2021
 */

class Api
{
    private static $APIURL = "https://api.ibanapi.com/v1/";
    private $api_key = "";

    public function __construct($api_key)
    {
        if ($api_key == "") {
            throw new \Exception("Please provide API Key!");
        }

        $this->api_key = $api_key;
    }

    /**
     * @description Validate the IBAN and get bank data
     * @param $iban the iban number
     * @return string json response.
     */
    public function validateIBAN($iban)
    {
        $data =[
            'iban'=>$iban,
            'api_key'=>$this->api_key
        ];

        return $this->_curl(self::$APIURL."validate",$data);
    }

    /**
     * @description Validate the IBAN with basic data only
     * @param $iban the iban number
     * @return string json response.
     */
    public function validateIBANBasic($iban)
    {
        $data =[
            'iban'=>$iban,
            'api_key'=>$this->api_key
        ];

        return $this->_curl(self::$APIURL."validate-basic",$data);
    }

    /**
     * @description Get the account balance
     * @return string json response.
     */
    public function getBalance()
    {
        $data =[
            'api_key'=>$this->api_key
        ];

        return $this->_curl(self::$APIURL."balance",$data);
    }

    private function _curl($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Accept: application/json'
        ));

        curl_setopt($ch, CURLOPT_USERAGENT,"IBANAPI PHP Package 1.0");
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $contents = curl_exec($ch);
        curl_close($ch);

        return $contents;
    }
}
