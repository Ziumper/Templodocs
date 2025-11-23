<?php

declare(strict_types=1);

namespace Ziumper\Templodocs\Tests\Unit\Tempo;

use PHPUnit\Framework\Attributes\{DataProviderExternal,CoversClass};
use PHPUnit\Framework\TestCase;
use Ziumper\Templodocs\Core\CsvReaderBuilder;
use Ziumper\Templodocs\Tempo\TempoReport;
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
}
