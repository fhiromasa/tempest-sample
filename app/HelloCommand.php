<?php

declare(strict_types=1);

namespace App;

use Tempest\Console\ConsoleCommand;
use Tempest\Console\HasConsole;

final class HelloCommand
{
    use HasConsole;

    #[ConsoleCommand]
    public function world(string $name = 'stranger'): void
    {
        $this->success("Hello, {$name}!");
    }
}
