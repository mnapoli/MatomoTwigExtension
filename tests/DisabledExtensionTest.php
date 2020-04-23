<?php

namespace Tests\MatomoTwigExtension;

use MatomoTwigExtension\MatomoTwigExtension;
use Twig\Test\IntegrationTestCase;

class DisabledExtensionTest extends IntegrationTestCase
{
    protected function getExtensions()
    {
        return [
            new MatomoTwigExtension(null, null, false),
        ];
    }

    protected function getFixturesDir()
    {
        return __DIR__ . '/DisabledExtensionFixture/';
    }
}
