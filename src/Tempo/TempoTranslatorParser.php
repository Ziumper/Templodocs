<?php

declare(strict_types=1);

namespace Ziumper\Templodocs\Tempo;

use League\Csv\TabularData;
use Override;
use Ziumper\Templodocs\Core\TranslatorService;
use Ziumper\Templodocs\Report\Parser;
use Ziumper\Templodocs\Report\ParserResult;

use function assert;

readonly class TempoTranslatorParser implements Parser
{
    public function __construct(
        private TranslatorService $translator,
        private string $from,
        private string $to
    ) {
    }

    #[Override]
    public function parse(mixed $reportRow): ParserResult
    {
        assert($reportRow instanceof TabularData);
        $content = $reportRow["Worklog"];
        $reportRow["Worklog"] = $this->translator->translate($content, $this->from, $this->to);
        $result = new ParserResult();
        $result->result = $reportRow;
        return $result;
    }
}
