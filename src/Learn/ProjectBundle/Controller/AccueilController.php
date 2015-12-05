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

    public function ModerationAction(){
        
        return $this->render('LearnProjectBundle::Moderation/accueil_moderation.html.twig');
    }
    
    public function AdministrationAction(){
        
        return $this->render('LearnProjectBundle::Administration/accueil_admin.html.twig');
    }
}
