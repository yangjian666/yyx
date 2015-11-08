<?php
/**
 * Created by PhpStorm.
 * User: triumyang
 * Date: 15-11-8
 * Time: 上午9:40
 */

class CurlHttp {

    const URL_HOST_PREFIX = 'http://112.74.204.153:18055/Api?';
    const ROOM_NUMBER = '101';
    const KEY = 'HBCOIN_API';
    const PASSWARD = 'HbCoin_Api_pass123';
    const MAX_CONFIMATIOINS = 1;

    static private $instance = null;

    private $url = null;

    private $parameters = array();


    static public function getInstance(){
        if(self::$instance){
            return self::$instance;
        }
        self::$instance = new CurlHttp();
        return self::$instance;
    }

    public function get($queryStringArray){
        $signArr = array(
            'rid' => self::ROOM_NUMBER,
            'account' => self::KEY,
            'accountpass' => self::PASSWARD
        );
        $this->parameters = array_merge($signArr, $queryStringArray);
        $urlString = self::URL_HOST_PREFIX . $this->getQuerySting();

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $urlString);
        //curl_setopt($curl, CURLOPT_HEADER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
    }

    public function post(){

    }

    public function getQuerySting($inArray = array()){
        $toStringArr = $this->parameters;
        $toString = '';

        if(!empty($inArray)){
            $toStringArr = $inArray;
        }

        foreach($toStringArr as $key=>$value){
            $toString .= '&'.$key.'='.$value;
        }
        return $toString;
    }

    public function getUrl(){
        return $this->url;
    }
    public function setUrl($url){
        $this->url = $url;
    }

    public function getParameters(){
        return $this->parameters;
    }
    public function setParameters($parameters){
        $this->parameters = $parameters;
    }

}

?>