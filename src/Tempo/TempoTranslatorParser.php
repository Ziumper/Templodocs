<?php

declare(strict_types=1);

namespace Ziumper\Templodocs\Tempo;

use League\Csv\TabularData;
use Override;
use Ziumper\Templodocs\Core\TranslatorService;
use Ziumper\Templodocs\Report\Parser;

use function assert;

class TempoTranslatorParser implements Parser
{
    public function __construct(
        private readonly TranslatorService $translator,
        private string $from,
        private string $to
    ) {
    }

    #[Override]
    public function parse(object $reportRow): void
    {
        assert($reportRow instanceof TabularData);
        $content = $reportRow["row"];
        $reportRow["row"] = $this->translator->translate($content, $this->from, $this->to);
    }
}
