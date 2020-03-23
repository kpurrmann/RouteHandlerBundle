<?php
declare(strict_types=1);

namespace PurrmannWebsolutions\RouteNoteBundle;

use PurrmannWebsolutions\RouteNoteBundle\DependencyInjection\PurrmannWebsolutionsRouteNoteExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class PurrmannWebsolutionsRouteNoteBundle
 * @copyright 2020 Kevin Purrmann
 */
class PurrmannWebsolutionsRouteNoteBundle extends Bundle
{
    /**
     * getContainerExtension.
     * @return PurrmannWebsolutionsRouteNoteExtension|\Symfony\Component\DependencyInjection\Extension\ExtensionInterface|null
     */
    public function getContainerExtension()
    {
        return new PurrmannWebsolutionsRouteNoteExtension();
    }
}
