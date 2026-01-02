<?php 
namespace Fragments\Http;

class Response {

    public function json(
        array $content
    ){
        return json_encode($content);
    }

    public static function notFound(){
        http_response_code(404);
        return "Not Found";
    }

}