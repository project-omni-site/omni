<?php

namespace ProjectOmniSite\Omni\Commands;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface CommandInterface
{
    public static function execute(array $args): void;
}
