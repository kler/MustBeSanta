<?php

namespace MustBeSanta;

class Generator
{
    private $recap = [
        'Special night, beard that\'s white',
        'Cap on head, suit that\'s red',
        'HO HO HO, cherry nose',
        'Reindeer sleigh, come our way',
    ];

    private function getSanta()
    {
        return str_repeat('Must be Santa' . PHP_EOL, 2) . 'Must be Santa, Santa Clause';
    }

    private function getReindeers()
    {
        return
            'Dasher, Dancer, Prancer, Vixen' . PHP_EOL
            . 'Eisenhower, Kennedy, Johnson, Nixon' . PHP_EOL
            . 'Comet, Cupid, Donner and Blitzen' . PHP_EOL
            . 'Carter, Reagan, Bush and Clinton' . PHP_EOL
        ;
    }

    private function getRecap($i)
    {
        $result = '' . $i . ' ';
        for ($j = (int)floor($i / 3); $j > 0; $j--) {
            $result .= $j . ' ';
            if ($j >= 4) continue;
            $result .= $this->recap[$j] . PHP_EOL;
        }
        return $result;
    }

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

        $result .= $this->getReindeers() . PHP_EOL . PHP_EOL;
        $result .= $this->getSanta() . PHP_EOL . PHP_EOL . $this->getSanta();

        return $result;
    }
}
