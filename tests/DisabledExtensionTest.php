<?php

namespace Tests\PiwikTwigExtension;

use PiwikTwigExtension\PiwikTwigExtension;
use Twig\Test\IntegrationTestCase;

class DisabledExtensionTest extends IntegrationTestCase
{
    protected function getExtensions()
    {
        return [
            new PiwikTwigExtension(null, null, false),
        ];
    }

    protected function getFixturesDir()
    {
        return __DIR__ . '/DisabledExtensionFixture/';
    }
}
