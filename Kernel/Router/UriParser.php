<?php

namespace Kernel\Router;
use Kernel\Http\Request;
class UriParser
{
//    UriParser: Этот класс будет отвечать за разбор URI запроса.
   public static function parseUri(): string
    {
        $request = Request::createFromGlobals();
        // Strip query string (?foo=bar) and decode URI
        if (false !== $pos = strpos($request->uri(), '?')) {
            $uri = substr($request->uri(), 0, $pos);
        }
        return rawurldecode($request->uri());
    }
}