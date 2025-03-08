<?php

namespace ProjectOmniSite\Omni;

use ProjectOmniSite\Omni\Commands\HelpCommand;
use ProjectOmniSite\Omni\Commands\ServeCommand;

class OmniApplication
{
    protected static array $commands = [
        'help' => HelpCommand::class,
        'serve' => ServeCommand::class,
    ];

    public static function run(array $argv): void
    {
        if (count($argv) < 2) {
            self::showHelp();
            exit(1);
        }

        $commandName = $argv[1];
        $args = array_slice($argv, 2);

        if (!array_key_exists($commandName, self::$commands)) {
            echo "Comando '$commandName' não reconhecido!\n";
            self::showHelp();
            exit(1);
        }

        $commandClass = self::$commands[$commandName];
        $commandClass::execute($args);
    }

    public static function showHelp(): void
    {
        echo "Uso: omni <comando> [opções]\n";
        echo "Comandos disponíveis:\n";
        foreach (array_keys(self::$commands) as $command) {
            $commandClass = new self::$commands[$command];
            $usage = $commandClass::$usage ?: '';
            $description = $commandClass::$description ?: '';
            echo "  $command $usage\n";
            echo "    $description\n";
        }
    }
}
