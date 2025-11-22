<?php

declare(strict_types=1);

namespace Ziumper\Templodocs\Tests\Unit\Core;

use Ziumper\Templodocs\Core\TranslatorService;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(TranslatorService::class)]
class TranslatorServiceTest extends TestCase
{
    public function testTranslationFromCzechToEnglish(): void
    {
        $translationService = new TranslatorService();
        $result = $translationService->translate(
            content: "Jdeme na pivo",
            from: "cs",
            to: "en"
        );

        static::assertEquals($result, "Let's go for a beer");
    }
}
