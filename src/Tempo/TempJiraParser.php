<?php

namespace Ziumper\Templodocs\Tempo;

use Override;
use Ziumper\Templodocs\Report\Parser;

/**
 * Description of TempJiraParser
 *
 * @author ziumper
 */
class TempJiraParser implements Parser {
    
    public function __construct(private string $jiraUrl) 
    {
        
    }

    #[Override]
    public function parse(object $reportRow): void 
    {
        assert($reportRow instanceof TabularData);
        $reportRow["row"] .= "\n".$this->jiraUrl;
    }
}
