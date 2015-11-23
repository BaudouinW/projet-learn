<?php

namespace Learn\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of ShopController
 *
 * @author Kyma
 */
class ShopController extends Controller {
    
    public function AccueilAction(){
        
        return $this->render('LearnShopBundle::accueil_shop.html.twig');
    }
}
