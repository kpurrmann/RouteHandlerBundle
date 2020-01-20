<?php

declare(strict_types=1);

namespace PurrmannWebsolutions\RouteNoteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class NoteController
 * @copyright 2020 Kevin Purrmann
 */
class NoteController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{


    public function index(Request $request) : Response
    {
        return $this->render('PurrmannWebsolutionsRouteNoteBundle:notes:index.html.twig');
    }
}
