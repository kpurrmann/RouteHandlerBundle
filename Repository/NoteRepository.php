<?php

declare(strict_types=1);

namespace PurrmannWebsolutions\RouteNoteBundle\Repository;

use Doctrine\ORM\EntityRepository;
use PurrmannWebsolutions\RouteNoteBundle\Entity\Note;

/**
 * Class NoteRepository
 * @package PurrmannWebsolutions\RouteNoteBundle\Repository
 * @copyright 2020 Kevin Purrmann
 */
class NoteRepository extends EntityRepository
{
    /**
     * findByUri.
     * @param string $uri
     * @return Note|null
     */
    public function findByUri(string $uri): ?Note
    {
        return $this->findOneBy(['uri' => $uri]);
    }
}
