<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article")
     */
    public function index(Request $request)
    {
        $isActive = true;

        //Get the Doctrine manager
        $em = $this->getDoctrine()->getManager();

        //Get all the entities from Article table
        $articles = $em->getRepository(Article::class)->findAll();
        $articlesActive = $em->getRepository(Article::class)->findBy(['active' => $isActive]);

        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($article->getActive() === null) {
                $article->setActive(0);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();
        }
        //Send to the View template 'article/index.html.twig', an array of content
        return $this->render('article/index.html.twig', [
            'articles' => $articles,
            'articlesActive' => $articlesActive,
            'form' => $form->createView()
        ]);
    }
}
