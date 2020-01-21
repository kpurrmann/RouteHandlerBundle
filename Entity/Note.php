<?php

declare(strict_types=1);

namespace PurrmannWebsolutions\RouteNoteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Note
 * @package PurrmannWebsolutions\RouteNoteBundle\Entity
 * @copyright 2018 Kevin Purrmann
 * @ORM\Entity(repositoryClass="PurrmannWebsolutions\RouteNoteBundle\Repository\NoteRepository")
 * @ORM\Table(name="pws_notes")
 */
class Note
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     * @var string
     */
    private $uri;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    private $note;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    private $priority = false;

    /**
     * @return int
     */
    public function getId(): ?int
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
    public function getUri(): ?string
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
    public function getNote(): ?string
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
