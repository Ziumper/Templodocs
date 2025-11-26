<?php

declare(strict_types=1);

namespace Ziumper\Templodocs\Tests\Unit\Tempo;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use Ziumper\Templodocs\Core\CsvReaderBuilder;
use Ziumper\Templodocs\Core\TranslatorService;
use Ziumper\Templodocs\Tempo\TempoReport;
use Ziumper\Templodocs\Tempo\TempoTranslatorParser;
use Ziumper\Templodocs\Tests\Utils\TempoDataProvider;

#[CoversClass(TempoReport::class)]
final class TempoReportTest extends TestCase
{
    #[DataProviderExternal(TempoDataProvider::class, 'reportDataProvider')]
    public function testGetTempoReportContent(string $csvContnet, string $expected): void
    {
        $reader = (new CsvReaderBuilder())->withString($csvContnet)->build();
        $reporter = new TempoReport($reader);

        $content = $reporter->getContent();
        static::assertEquals($expected, $content);
    }

    #[DataProviderExternal(TempoDataProvider::class, 'translatedDataProvider')]
    public function testTranslatedReportContent(string $csvContnet, string $expected): void
    {
        $reader = (new CsvReaderBuilder())->withString($csvContnet)->build();
        $reporter = new TempoReport(
            $reader,
            [
                    new TempoTranslatorParser(new TranslatorService(), from: "en", to: "pl")
                ]
        );

        static::assertEquals($expected, $reporter->getContent());
    }
}
