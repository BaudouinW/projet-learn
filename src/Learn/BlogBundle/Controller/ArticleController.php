<?php

namespace Learn\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Learn\BlogBundle\Entity\Article;
use Learn\BlogBundle\Form\ArticleType;

/**
 * Description of ArticleController
 *
 * @author frwartel
 */
class ArticleController extends Controller {

    public function AddAction(Request $request) {

        $article = new Article();

        $form = $this->createForm(new ArticleType(), $article);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            $this->addFlash('success', 'Article ajouté');
        }

        return $this->render('LearnProjectBundle::Default/add_article.html.twig', array('form' => $form->createView(),));
    }

    public function ModifAction($id, Request $request) {

        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('LearnBlogBundle:Article')->find($id);

        $form = $this->createForm(new ArticleType(), $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $article->setAuteur($form->get('auteur')->getData());
            $article->setTitre($form->get('titre')->getData());
            $article->setContenu($form->get('contenu')->getData());
            $article->setDatePublication($form->get('datePublication')->getData());
            $em->flush();

            $this->addFlash('modif', 'Article modifié');
        }

        return $this->render('LearnProjectBundle::Default/modif_article.html.twig', array('form' => $form->createView(), 'id' => $id));
    }

    public function DetailAction($id) {

        $article = $this->getDoctrine()->getManager()->getRepository('LearnBlogBundle:Article')->find($id);

        return $this->render('LearnProjectBundle::Default/detail_article.html.twig', array('article' => $article));
    }

    public function SupprAction($id) {

        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('LearnBlogBundle:Article')->find($id);

        $em->remove($article);
        $em->flush();
        
        return $this->redirectToRoute('learn_project_homepage');
    }

}
