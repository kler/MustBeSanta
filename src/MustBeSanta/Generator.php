<?php

namespace MustBeSanta;

use MustBeSanta\Ensemble\Protagonist;
use MustBeSanta\Ensemble\Sidekicks;
use MustBeSanta\Ensemble\SidekicksFormatter;

class Generator
{
    /** @var array Recap of story */
    private $recap = [
        'Reindeer sleigh, come our way',
        'HO HO HO, cherry nose',
        'Cap on head, suit that\'s red',
        'Special night, beard that\'s white',
    ];

    /** @var Protagonist */
    private $protagonist;
    /** @var Sidekicks */
    private $sidekicks;
    /** @var SidekicksFormatter */
    private $sidekicksFormatter;

    /**
     * @return Protagonist
     */
    public function getProtagonist()
    {
        return $this->protagonist;
    }

    /**
     * @param Protagonist $protagonist
     */
    public function setProtagonist($protagonist)
    {
        $this->protagonist = $protagonist;
    }

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
     * @return SidekicksFormatter
     */
    public function getSidekicksFormatter()
    {
        return $this->sidekicksFormatter;
    }

    /**
     * @param SidekicksFormatter $sidekicksFormatter
     */
    public function setSidekicksFormatter($sidekicksFormatter)
    {
        $this->sidekicksFormatter = $sidekicksFormatter;
    }

    /**
     * @return string
     */
    private function getSanta()
    {
        $protagonist = $this->getProtagonist();
        $firstName = $protagonist->getFirstName();
        $lastName = $protagonist->getLastName();
        return
            str_repeat('Must be ' . $firstName . PHP_EOL, 2)
            . 'Must be ' . $firstName
            . ', ' . $firstName . ' ' . $lastName;
    }

    /**
     * @return string
     */
    private function getReindeers()
    {
        $this->getSidekicksFormatter()->setSidekicks($this->getSidekicks());
        return $this->getSidekicksFormatter()->format(4);
    }

    /**
     * @param $i
     * @return string
     */
    private function getRecap($i)
    {
        switch ((int)floor($i / 3)) {
            case 1:
                return $this->recap[3] . PHP_EOL;
            case 2:
                return
                    $this->recap[2] . PHP_EOL
                    . $this->recap[3] . PHP_EOL;
            case 3:
                return
                    $this->recap[1] . PHP_EOL
                    . $this->recap[2] . PHP_EOL
                    . $this->recap[3] . PHP_EOL;
            case 4:
            case 5:
                return
                    $this->recap[0] . PHP_EOL
                    . $this->recap[1] . PHP_EOL
                    . $this->recap[2] . PHP_EOL
                    . $this->recap[3] . PHP_EOL;
            default:
                return $i . PHP_EOL;

        }
    }

    /**
     * @return string
     */
    public function execute()
    {
        $sentences = [
            "got a beard that's long and white",
            "comes around on a special night", // Special Night, beard that's white
            "wears boots and a suit of red",
            "wears a long cap on his head",    // Cap on head, suit that's red
            "got a big red cherry nose",
            "laughs this way HO HO HO",        // HO HO HO, cherry nose
            "very soon will come our way",
            "little reindeer pull his sleigh"  // Reindeer sleigh, come our way
        ];

        $result = '';
        for ($i = 0; $i < count($sentences) * 2; $i++) {
            $sentence = $sentences[(int)floor($i / 2)];
            $row = ($i % 2 === 0 ? 'Who' : 'Santa');
            if (substr($sentence, 0, 6) === 'little' && $i % 2 === 0) {
                $row = 'Eight';
            }
            if (substr($sentence, 0, 3) === 'got' || (substr($sentence, 0, 6) === 'little' && $i % 2 === 1)) {
                $row .= "'s";
            }
            $row .= ' ' . $sentence . ((substr($sentence, 0, 6) != 'little' && $i % 2 === 0) ? '?' : '');
            $result .= $row . PHP_EOL;

            $result .= ($i % 4 === 3 ? PHP_EOL . $this->getRecap($i) . PHP_EOL . $this->getSanta() . PHP_EOL . PHP_EOL : '');
        }

        $result .= $this->getReindeers() . PHP_EOL;
        $result .= $this->getRecap(15) . PHP_EOL;
        $result .= $this->getSanta() . PHP_EOL . PHP_EOL . $this->getSanta();

        return $result;
    }
}
