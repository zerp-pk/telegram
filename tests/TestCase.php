<?php

namespace Zerp\Telegram\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Zerp\Telegram\Providers\TelegramServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [TelegramServiceProvider::class];
    }
}
