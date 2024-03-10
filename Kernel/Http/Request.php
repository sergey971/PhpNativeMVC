<?php

namespace Kernel\Http;

class Request
{

    public function __construct (
        private readonly array $get,
        private readonly array $post,
        private readonly array $server,
        private readonly array $files,
        private readonly array $cookies,
    ){}

    public static function createFromGlobals(): static{
        return new static(
            $_GET, $_POST, $_SERVER, $_FILES, $_COOKIE,);
    }

    public function uri(): string{
        return $this -> server ['REQUEST_URI'];
    }
    public function method(): string{
        return $this -> server['REQUEST_METHOD'];
    }
}