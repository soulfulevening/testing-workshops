<?php

namespace AppBundle\Entity;

use DateTime;
use Exception;

class Subscription
{

    /**
     * @var string
     */
    private $email;

    /**
     * @var DateTime
     */
    private $date;

    /**
     * @var boolean
     */
    private $isActive = true;

    /**
     * Subscription constructor.
     *
     * @throws Exception
     */
    public function __construct()
    {
        $this->date = new DateTime();
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     */
    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     */
    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }
}