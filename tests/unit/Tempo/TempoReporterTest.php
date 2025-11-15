<?php

declare(strict_types=1);

namespace Ziumper\Templodocs\Tests\Unit\Tempo;

use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use PHPUnit\Metadata\CoversClass;
use Ziumper\Templodocs\Core\CsvReaderBuilder;
use Ziumper\Templodocs\Tempo\TempoReporter;
use Ziumper\Templodocs\Tests\Utils\TempoDataProvider;

#[CoversClass(TempoReporter::class)]
final class TempoReporterTest extends TestCase
{
    #[DataProviderExternal(TempoDataProvider::class, 'reportDataProvider')]
    public function testGetContent(string $csvContnet, array $expected)
    {
        $reader = (new CsvReaderBuilder())->withString($csvContnet)->build();
        $reporter = new TempoReporter();

        $content = $reporter->getContent($reader)["content"];
        static::assertEquals($expected["content"], $content);
    }
}
