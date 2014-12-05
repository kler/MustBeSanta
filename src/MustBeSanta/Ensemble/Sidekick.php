<?php


namespace MustBeSanta\Ensemble;


class Sidekick {
    /** @var String */
    private $firstName;

    /**
     * @return String
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param String $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
}