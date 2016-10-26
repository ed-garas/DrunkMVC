<?php
defined('CORE_PATH') or exit('no access');

class ResponseFactory
{
    public static function create(Request $request){
        return $request->isAjax() ? new JsonResponse() : new HtmlResponse();
    }

}