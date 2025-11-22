<?php

namespace Ziumper\Templodocs;

use PhpOffice\PhpWord\TemplateProcessor;

class WordFileGenerator
{
    private string $format = '.docx';

    /**
     * @param array<string,string> $values
     */
    public function __construct(
        private string $templateFile,
        private string $outputFile,
        private array $values,
    ) {
    }

    public function generate(): void
    {
        $template = new TemplateProcessor($this->templateFile);

        foreach ($this->values as $key => $value) {
            $template->setValue($key, nl2br(htmlspecialchars($value)));
        }

        $template->saveAs($this->getFilename());
    }

    public function getFilename(): string
    {
        return $this->outputFile . $this->format;
    }
}
