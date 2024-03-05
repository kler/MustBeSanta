<?php

class SidekicksFormatterTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @param $amount
     * @return \MustBeSanta\Ensemble\Sidekicks
     */
    private function generateSidekicks($amount)
    {
        $i = 1;
        $sidekicks = new MustBeSanta\Ensemble\Sidekicks();
        while ($i <= $amount) {
            $sidekick = new MustBeSanta\Ensemble\Sidekick();
            $sidekick->setFirstName('Number ' . $i );
            $sidekicks->addSidekick($sidekick);
            $i++;
        }
        return $sidekicks;
    }

    /**
     * Test format sixteen elements
     */
    public function testFormatSixteen()
    {
        $expected =
            'Number 1, Number 2, Number 3, Number 4' . PHP_EOL
            . 'Number 5, Number 6, Number 7, Number 8' . PHP_EOL
            . 'Number 9, Number 10, Number 11 and Number 12' . PHP_EOL
            . 'Number 13, Number 14, Number 15 and Number 16' . PHP_EOL;

        $sidekicks = $this->generateSidekicks(16);

        $sidekicksFormatter = new MustBeSanta\Ensemble\SidekicksFormatter();
        $sidekicksFormatter->setSidekicks($sidekicks);
        $actual = $sidekicksFormatter->format(4);

        $this->assertEquals($expected, $actual);
    }
}