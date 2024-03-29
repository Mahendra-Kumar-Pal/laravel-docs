<?php

namespace App\Constants;

class ResponseCode
{
    const OK = 'OK'; //200
    const CREATED = 'CREATED'; //201
    const ACCEPTED = 'ACCEPTED'; //202
    const NO_CONTENT = 'NO CONTENT'; //204
    const BAD_REQUEST = 'BAD REQUEST'; //400
    const UNAUTHORISED = 'UNAUTHORISED'; //401
    const NOT_FOUND = 'NOT FOUND'; //404
    const INTERNAL_SERVER_ERROR =  'INTERNAL SERVER ERROR'; //500
    const UNPROCESSABLE_ENTITY = 'UNPROCESSABLE ENTITY';//422
    const FORBIDDEN ="FORBIDDEN";
    const TEMPORARY_REDIRECT = "TEMPORARY REDIRECT";
    
    const OK_CODE = 200;
    const CREATED_CODE = 201;
    const ACCEPTED_CODE = 202;
    const NO_CONTENT_CODE = 204;
    const BAD_REQUEST_CODE = 400;
    const UNAUTHORISED_CODE = 401;
    const UNPROCESSABLE_ENTITY_CODE = 422;
    const NOT_FOUND_CODE = 404;
    const HTTP_FORBIDDEN_CODE = 403;
    const INTERNAL_SERVER_ERROR_CODE = 500;
    const TEMPORARY_REDIRECT_CODE = 307;
}

?>