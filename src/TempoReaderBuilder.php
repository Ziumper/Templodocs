<?php

declare(strict_types=1);

namespace Ziumper\Templodocs;

use League\Csv\Reader;

class TempoReaderBuilder
{
    private ?string $path = null;
    private ?string $string = null;

    public function withString(string $string): self
    {
        $this->string = $string;
        return $this;
    }

    public function withPath(string $path): self
    {
        $this->path = $path;
        return $this;
    }

    public function build(): ?Reader
    {
        if (empty($this->path) && empty($this->string)) {
            return null;
        }
        
        $reader = ($this->path != null ? Reader::from($this->path, "r") : Reader::fromString($this->string));
        $reader->setHeaderOffset(0);
        return $reader;
    }
}
