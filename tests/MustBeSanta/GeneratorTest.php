<?php

class GeneratorTest extends \PHPUnit\Framework\TestCase {

    /** @var string Facit */
    private $originalText = <<<EOF
Who's got a beard that's long and white?
Santa's got a beard that's long and white
Who comes around on a special night?
Santa comes around on a special night

Special night, beard that's white

Must be Santa
Must be Santa
Must be Santa, Santa Clause

Who wears boots and a suit of red?
Santa wears boots and a suit of red
Who wears a long cap on his head?
Santa wears a long cap on his head

Cap on head, suit that's red
Special night, beard that's white

Must be Santa
Must be Santa
Must be Santa, Santa Clause

Who's got a big red cherry nose?
Santa's got a big red cherry nose
Who laughs this way HO HO HO?
Santa laughs this way HO HO HO

HO HO HO, cherry nose
Cap on head, suit that's red
Special night, beard that's white

Must be Santa
Must be Santa
Must be Santa, Santa Clause

Who very soon will come our way?
Santa very soon will come our way
Eight little reindeer pull his sleigh
Santa's little reindeer pull his sleigh

Reindeer sleigh, come our way
HO HO HO, cherry nose
Cap on head, suit that's red
Special night, beard that's white

Must be Santa
Must be Santa
Must be Santa, Santa Clause

Dasher, Dancer, Prancer, Vixen
Eisenhower, Kennedy, Johnson, Nixon
Comet, Cupid, Donner and Blitzen
Carter, Reagan, Bush and Clinton

Reindeer sleigh, come our way
HO HO HO, cherry nose
Cap on head, suit that's red
Special night, beard that's white

Must be Santa
Must be Santa
Must be Santa, Santa Clause

Must be Santa
Must be Santa
Must be Santa, Santa Clause
EOF;

    /** @var array Sidekicks */
    private $reindeers = [
        'Dasher',
        'Dancer',
        'Prancer',
        'Vixen',
        'Eisenhower',
        'Kennedy',
        'Johnson',
        'Nixon',
        'Comet',
        'Cupid',
        'Donner',
        'Blitzen',
        'Carter',
        'Reagan',
        'Bush',
        'Clinton'
    ];

    /**
     * Test Generator
     */
    public function testGenerator()
    {
        $protagonist = new MustBeSanta\Ensemble\Protagonist();
        $protagonist->setFirstName('Santa');
        $protagonist->setLastName('Clause');

        $sidekicks = new MustBeSanta\Ensemble\Sidekicks();
        foreach ($this->reindeers as $reindeerName) {
            $deuteragonist = new MustBeSanta\Ensemble\Sidekick();
            $deuteragonist->setFirstName($reindeerName);
            $sidekicks->addSidekick($deuteragonist);
        }

        $generator = new MustBeSanta\Generator();
        $generator->setProtagonist($protagonist);
        $generator->setSidekicks($sidekicks);
        $generator->setSidekicksFormatter(new \MustBeSanta\Ensemble\SidekicksFormatter());
        $text = $generator->execute();
        $this->assertEquals($this->originalText, $text);
    }
}
