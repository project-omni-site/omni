<?php

namespace ProjectOmniSite\Omni\Commands;

class HelpCommand implements CommandInterface
{
    public static string $usage = 'omni help';
    public static string $description = 'Exibe a lista de comandos disponíveis e suas descrições.';

    public static function execute(array $args): void
    {
        \ProjectOmniSite\Omni\OmniApplication::showHelp();
    }
}
