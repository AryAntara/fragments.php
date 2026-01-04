<?php 
namespace Fragments\Lib\Http;

class Response {

    public function json(
        array $content
    ){
        header('Content-Type: application/json');
        return json_encode($content);
    }

    public static function notFound(){
        http_response_code(404);
        return "Not Found";
    }

}