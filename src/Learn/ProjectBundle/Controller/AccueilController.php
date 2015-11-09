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

        $articles = $this->getDoctrine()->getManager()->getRepository('LearnProjectBundle:Article')->findAll();

        return $this->render('default/accueil.html.twig', array('articles' => $articles));
    }
    
    public function RecentAction(){
        
        $articleRecent = $this->getDoctrine()->getRepository('LearnProjectBundle:Article')->findRecentArticle();
        
        return $this->render('LearnProjectBundle::Default/article_recent.html.twig', array('articleRecent' => $articleRecent));
    }

}
