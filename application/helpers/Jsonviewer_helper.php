<?php

function _json($data)
{
    header('content-type:application/json');
    echo json_encode($data);exit;
}

function res_api($code, $data = array()) {
    header('content-type:application/json');
    http_response_code($code);
    echo json_encode($data);
    exit;
}

if ( ! function_exists('limit_words'))
{
    function limit_words($string, $word_limit)
    {
        $words = explode(" ", $string);
        return implode(" ", array_splice($words, 0, $word_limit));
    }
}