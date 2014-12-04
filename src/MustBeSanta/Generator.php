<?php

namespace MustBeSanta;

class Generator
{
    private $recap = [
        'Reindeer sleigh, come our way',
        'HO HO HO, cherry nose',
        'Cap on head, suit that\'s red',
        'Special night, beard that\'s white',
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
