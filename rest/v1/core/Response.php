<?php

class Response
{
    private $_success;
    private $_data;
    private $_toCache = false;
    private $_statusCode = 200;
    private $_responseData = array();

    public function setSuccess($success)
    {
        $this->_success = $success;
    }

    public function setData($data)
    {
        $this->_data = $data;
    }

    public function setToCache($toCache)
    {
        $this->_toCache = $toCache;
    }

    public function setStatusCode($statusCode)
    {
        $this->_statusCode = $statusCode;
    }

    public function send()
    {
        http_response_code($this->_statusCode);
        header('Content-Type: application/json; charset=utf-8;');

        if ($this->_toCache == true) {
            header("Cache-Control: max-age=60");
        } else {
            header("Cache-Control: no-cache, no-store");
        }

        $this->_responseData = $this->_data;

        echo json_encode($this->_responseData);
    }


}
