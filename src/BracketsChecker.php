<?php

namespace Asv1979\Otus3;

/**
 * Проверка математического выражения на корректность отк и закр скобок
 */
class BracketSChecker
{
    const OPENING_BRACKET = '(';
    const CLOSING_BRACKET = ')';

    /**
     * @param string $string
     * @return bool
     */
    public function isValid(string $string): bool
    {
        if ($this->checkInvalidSymbols($string)) {
            throw new \InvalidArgumentException('The string contains invalid characters.');
        }

        return $this->checkOpenCloseBracketsEqual($string);
    }

    /**
     * @param string $string
     * @return bool
     */
    private function checkOpenCloseBracketsEqual(string $string): bool
    {
        $count = 0;

        for ($i = 0; $i < strlen($string); ++$i) {
            $character = $string[$i];

            if (self::OPENING_BRACKET === $character) {
                ++$count;
            } elseif (self::CLOSING_BRACKET === $character) {
                --$count;
            }

            // строка начинается с закрывающей скобки, или их больше
            if ($count < 0) {
                return false;
            }
        }

        //If opened and closed brackets are equal, all ok
        return $count === 0;
    }

    /**
     * @param string $string
     * @return bool
     */
    private function checkInvalidSymbols(string $string): bool
    {
        return !preg_match("/^([()\d\-+\\\*\r\n\t\s]*)$/", $string);
    }
}
