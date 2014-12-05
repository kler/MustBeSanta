<?php

namespace MustBeSanta\Ensemble;


class SidekicksFormatter {
    /** @var Sidekicks */
    private $sidekicks;

    /**
     * @return Sidekicks
     */
    public function getSidekicks()
    {
        return $this->sidekicks;
    }

    /**
     * @param Sidekicks $sidekicks
     */
    public function setSidekicks($sidekicks)
    {
        $this->sidekicks = $sidekicks;
    }

    /**
     * Get divider depending on which index we're on
     *
     * @param $index
     * @return string
     */
    private function getDivider($index)
    {
        if ($index === 10 || $index === 14) {
            return ' and ';
        }
        return ', ';
    }

    /**
     * @param int $sidekicksPerLine
     * @return string
     */
    public function format($sidekicksPerLine)
    {
        $sidekicks = $this->getSidekicks();
        $result = '';
        /** @var Sidekick $deuteragonist */
        foreach ($sidekicks as $index => $deuteragonist) {
            $result .= $deuteragonist->getFirstName();
            $result .= (($index + 1) % $sidekicksPerLine === 0 ? PHP_EOL : $this->getDivider($index));
        }
        return $result;
    }
}
