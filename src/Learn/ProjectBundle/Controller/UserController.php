<?php

namespace Learn\ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
/**
 * Description of UserController
 *
 * @author frwartel
 */
class UserController extends Controller{
  
    public function ContactAction(Request $request){
        
        $formContact= $this->createFormBuilder()
                ->add('email', 'email')
                ->add('objet', 'text')
                ->add('contenu', 'textarea')
                ->add('envoyer', 'submit')
                ->getForm();
        
        $formContact->handleRequest($request);
        
        if($formContact->isSubmitted() && $formContact->isValid()){
            
            $message = \Swift_Message::newInstance();
            
            $message
                    ->setSubject($formContact->get('objet')->getData())
                    ->setFrom($formContact->get('email')->getData())
                    ->setTo('baudouin.developpeur@gmail.com')
                    ->setBody($formContact->get('contenu')->getData())
                    ->setContentType('text/html');
            
            $this->get('mailer')->send($message);
            $this->addFlash('contact', 'Email envoyé !');
        }
        
        $articleRecent = $this->getDoctrine()->getRepository('LearnProjectBundle:Article')->findRecentArticle();
        
        return $this->render('LearnProjectBundle::Default/contact.html.twig', array('formContact' => $formContact->createView(),"articleRecent" => $articleRecent));
        
    }
}
