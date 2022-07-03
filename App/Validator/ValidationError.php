<?php

declare(strict_types=1);

namespace App\Validator;

class ValidationError
{
    private string $text;

    /**
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    public function __toString(): string
    {
        return json_encode([
            'error' => $this->text,
        ]);
    }
}
