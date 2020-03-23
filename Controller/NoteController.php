<?php

declare(strict_types=1);

namespace PurrmannWebsolutions\RouteNoteBundle\Controller;

use PurrmannWebsolutions\RouteNoteBundle\Entity\Note;
use PurrmannWebsolutions\RouteNoteBundle\Form\NoteType;
use PurrmannWebsolutions\RouteNoteBundle\Repository\NoteRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class NoteController
 * @copyright 2020 Kevin Purrmann
 */
class NoteController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    /**
     * index.
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $notes = $this->getNoteRepository()->findAll();
        return $this->render('PurrmannWebsolutionsRouteNoteBundle:notes:index.html.twig', ['notes' => $notes]);
    }

    /**
     * new.
     * @param Request $request
     * @return JsonResponse|RedirectResponse
     */
    public function save(Request $request)
    {

        $formData = $request->request->get(NoteType::FORM_NAME);
        if (!($note = $this->getNoteRepository()->findByUri($formData['uri']))) {
            $note = new Note();
        }

        $form = $this->createForm(NoteType::class, $note);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->persist($note);
            $this->getDoctrine()->getManager()->flush();
            return $this->createResponse($request, $note);
        }

        return $this->redirectToIndex();
    }

    /**
     * createResponse.
     * @param Request $request
     * @param Note $note
     * @return JsonResponse|RedirectResponse
     */
    protected function createResponse(Request $request, Note $note)
    {
        if ($request->isXmlHttpRequest()) {
            return new JsonResponse(['status' => 'success', 'note' => ['id' => $note->getId(), 'priority' => $note->isPriority()]]);
        }

        $this->addFlash('success', 'Note saved successfully');
        return $this->redirectToIndex();
    }

    /**
     * redirectToIndex.
     * @return RedirectResponse
     */
    protected function redirectToIndex(): RedirectResponse
    {
        return $this->redirect($this->generateUrl('pws_routenotebundle_notes_index'));
    }

    /**
     * getNoteRepository.
     * @return NoteRepository
     */
    protected function getNoteRepository(): NoteRepository
    {
        return $this->getDoctrine()->getManager()->getRepository(Note::class);
    }
}
