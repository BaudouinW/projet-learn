<?php

namespace Learn\ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of IndexController
 *
 * @author frwartel
 */
class AccueilController extends Controller {

    public function AccueilAction() {

        return $this->render('LearnProjectBundle::accueil.html.twig');
    }

}
