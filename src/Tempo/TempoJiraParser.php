<?php

namespace Ziumper\Templodocs\Tempo;

use League\Csv\TabularData;
use Override;
use Ziumper\Templodocs\Report\Parser;
use Ziumper\Templodocs\Report\ParserResult;

/**
 * Description of TempJiraParser
 *
 * @author ziumper
 */
class TempoJiraParser implements Parser
{
    public function __construct(private readonly string $jiraUrl)
    {
    }

    #[Override]
    public function parse(mixed $reportRow): ParserResult
    {
        assert($reportRow instanceof TabularData);
        $reportRow["Key"] .= "\n{$this->jiraUrl}/{$reportRow['Key']}";
        $parserResult = new ParserResult();
        $parserResult->result = $reportRow;
        return $parserResult;
    }
}
