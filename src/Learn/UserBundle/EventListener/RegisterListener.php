<?php

namespace Learn\UserBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Description of RegisterListener
 *
 * @author Kyma
 */
class RegisterListener implements EventSubscriberInterface
{
   private $router;

    public function __construct(UrlGeneratorInterface $router)
    {
        $this->router = $router;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegisterSuccess',
        );
    }

    public function onRegisterSuccess(FormEvent $event)
    {
        $url = $this->router->generate('learn_project_homepage');

        $event->setResponse(new RedirectResponse($url));
    }
}
