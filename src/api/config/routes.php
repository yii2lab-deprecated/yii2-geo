<?php

$version = API_VERSION_STRING;

return [
    ["class" => "yii\\rest\\UrlRule", "controller" => ["v1/city" => "geo/city"]],
    ["class" => "yii\\rest\\UrlRule", "controller" => ["v1/country" => "geo/country"]],
    ["class" => "yii\\rest\\UrlRule", "controller" => ["v1/currency" => "geo/currency"]],
    ["class" => "yii\\rest\\UrlRule", "controller" => ["v1/region" => "geo/region"]],
];
