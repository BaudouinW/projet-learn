<?php

namespace Learn\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Learn\BlogBundle\Entity\Commentaire;
use Learn\BlogBundle\Form\CommentaireType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of CommentController
 *
 * @author Kyma
 */
class CommentController extends Controller {
    
    public function AddAction($id,Request $request)
    {
        $article = $this->getArticle($id);
        $user = $this->container->get('security.context')->getToken()->getUser();
                
        $comment = new Commentaire();
        $comment->setArticle($article);
        $comment->setAuteur($user);
        $comment->setDate(new \DateTime());
        
        $form = $this->createForm(new CommentaireType(), $comment);
        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();       
        }
        
        return $this->redirect($this->generateUrl('learn_project_detail_article', array('id' => $id)));
    }
    
    protected function getArticle($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $article = $em->getRepository('LearnBlogBundle:Article')->find($id);
        
        if(!$article)
        {
            throw $this->createNotFoundException('Article non trouvé');
        }
        
        return $article;
    }
}
