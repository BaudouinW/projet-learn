<?php

namespace Learn\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function AccueilAction(){
        
        $articles = $this->getDoctrine()->getRepository('LearnBlogBundle:Article')->findAll();
        
        return $this->render('LearnBlogBundle::blog_accueil.html.twig', array('articles' => $articles));
    }
    public function RecentAction(){
        
        $articleRecent = $this->getDoctrine()->getRepository('LearnBlogBundle:Article')->findRecentArticle();
        
        return $this->render('LearnProjectBundle::Default/article_recent.html.twig', array('articleRecent' => $articleRecent));
    }
    
}
