<?php
/**
 * Created by PhpStorm.
 * User: kodusk
 * Date: 11/17/2017
 * Time: 9:46 PM
 */

class Captcha_Model extends CI_Model
{
    public function check_captcha($response)
    {
        $google_url="https://www.google.com/recaptcha/api/siteverify";
        $secret='6LfGGjkUAAAAAO37-N8GGoubTakblHvOeyHeZ-Al';
        $ip=$_SERVER['REMOTE_ADDR'];
        $url=$google_url."?secret=".$secret."&response=".$response."&remoteip=".$ip;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
        $res = curl_exec($curl);
        curl_close($curl);
        $res= json_decode($res, true);
        // reCaptcha success check

        if($res['success'])
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}