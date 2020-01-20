<?php

declare(strict_types=1);

namespace PurrmannWebsolutions\RouteNoteBundle\Entity;

class Note
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $route;

    /**
     * @var string
     */
    private $uri;

    /**
     * @var string
     */
    private $note;

    /**
     * @var bool
     */
    private $priority = false;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Note
     */
    public function setId(int $id): Note
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoute(): string
    {
        return $this->route;
    }

    /**
     * @param string $route
     * @return Note
     */
    public function setRoute(string $route): Note
    {
        $this->route = $route;
        return $this;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     * @return Note
     */
    public function setUri(string $uri): Note
    {
        $this->uri = $uri;
        return $this;
    }

    /**
     * @return string
     */
    public function getNote(): string
    {
        return $this->note;
    }

    /**
     * @param string $note
     * @return Note
     */
    public function setNote(string $note): Note
    {
        $this->note = $note;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPriority(): bool
    {
        return $this->priority;
    }

    /**
     * @param bool $priority
     * @return Note
     */
    public function setPriority(bool $priority): Note
    {
        $this->priority = $priority;
        return $this;
    }
}
