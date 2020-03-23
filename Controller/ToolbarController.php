<?php
declare(strict_types=1);

namespace PurrmannWebsolutions\RouteNoteBundle\Controller;

use PurrmannWebsolutions\RouteNoteBundle\Entity\Note;
use PurrmannWebsolutions\RouteNoteBundle\Form\NoteType;
use PurrmannWebsolutions\RouteNoteBundle\Repository\NoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ToolbarController extends AbstractController
{
    public function index(Request $request): Response
    {

        if (!($uri = $request->request->get('uri'))) {
            return Response::create();
        }

        $noteRepository = $this->getDoctrine()->getManager()->getRepository(Note::class);

        if (!($note = $noteRepository->findByUri($uri))) {
            $note = new Note();
            $note->setUri($uri);
        }

        $form = $this->createForm(NoteType::class, $note, [
            'action' => $this->generateUrl('pws_routenotebundle_notes_save')
        ]);

        return $this->render(
            '@PurrmannWebsolutionsRouteNote/toolbar/index.html.twig',
            ['noteForm' => $form->createView(), 'note' => $note]
        );
    }
}
