<?php

declare(strict_types=1);

namespace PurrmannWebsolutions\RouteNoteBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use PurrmannWebsolutions\RouteNoteBundle\Entity\Note;

/**
 * Class NoteRepository
 * @package PurrmannWebsolutions\RouteNoteBundle\Repository
 * @copyright 2020 Kevin Purrmann
 */
class NoteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Note::class);
    }

    /**
     * findByRoute.
     * @param string $route
     * @return Note|null
     */
    public function findByRoute(string $route): ?Note
    {
        return $this->findOneBy(['route' => $route]);
    }

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
