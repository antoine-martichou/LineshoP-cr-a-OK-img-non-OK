<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\CreateArticleType;
use App\Entity\Articles;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile ;


class CreateArticleController extends AbstractController
{
    /**
     * @Route("/create/article", name="create_article")
     */
    public function index(Request $request)
    {   
        $article = new Articles();
        $form = $this->createForm(CreateArticleType::class, $article);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $file = $article->getImage();
            $newfile = md5(uniqid().'.'.$file->guessExtension());
            $file->move($this->getParameter('upload_directory'), $newfile);
            $article->setImage($newfile);
            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($article);
            $doctrine->flush();
            return $this->redirectToRoute('article');
        }

        return $this->render('create_article/index.html.twig', [
            'controller_name' => 'CreateArticleController', 'form' => $form->createView()
        ]);
    }
}
