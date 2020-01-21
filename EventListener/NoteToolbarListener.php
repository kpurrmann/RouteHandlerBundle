<?php

declare(strict_types=1);

namespace PurrmannWebsolutions\RouteNoteBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\KernelEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Twig\Environment;

class NoteToolbarListener implements EventSubscriberInterface
{

    /**
     * @var Environment
     */
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function onKernelResponse(FilterResponseEvent $event): void
    {
        $response = $event->getResponse();
        $request = $event->getRequest();

        if (!($event->isMasterRequest()) || $request->isXmlHttpRequest()) {
            return;
        }

        $this->injectToolbar($response, $request);
    }

    protected function injectToolbar(Response $response, Request $request): void
    {
        $content = $response->getContent();
        $pos = strripos($content, '</body>');

        if (false !== $pos) {
            $toolbar = "\n" . str_replace(
                    "\n",
                    '',
                    $this->twig->render(
                        '@PurrmannWebsolutionsRouteNote/toolbar/init.js.twig',
                        ['request' => $request]
                    )
                ) . "\n";
            $content = substr($content, 0, $pos) . $toolbar . substr($content, $pos);
            $response->setContent($content);
        }
    }

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::RESPONSE => ['onKernelResponse', -256],
        ];
    }
}
