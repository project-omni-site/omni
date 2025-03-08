<?php

namespace ProjectOmniSite\Omni\Commands;

class ServeCommand implements CommandInterface
{
    public static string $usage = 'omni serve [--port=<porta>]';
    public static string $description = 'Inicia um servidor local para desenvolvimento. Você pode especificar a porta com --port=<porta>.';

    public static function execute(array $args): void
    {
        $port = 8000;
        foreach ($args as $arg) {
            if (strpos($arg, '--port=') === 0) {
                $port = substr($arg, strlen('--port='));
            }
        }
        $serverCommand = sprintf('php -S localhost:%d -t public', $port);
        echo "Executando: $serverCommand\n";
        passthru($serverCommand);
    }
}
