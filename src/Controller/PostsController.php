<?php

namespace App\Controller;

use App\Entity\SymfonyPosts;
use App\Form\PostsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PostsController extends AbstractController
{
    /**
     * @Route("/", name="posts")
     */
    public function index(): Response
    {
        $data = $this->getDoctrine()->getRepository(SymfonyPosts::class)->findAll();
        return $this->render('posts/index.html.twig', [
            'datas' => $data,
        ]);
    }

    /**
     * @Route("/create_post", name="create_post")
     */
    public function createPost(Request $request): Response
    {
        $posts = new SymfonyPosts();
        $form = $this->createForm(PostsType::class, $posts);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $this->getDoctrine()->getManager();
            $data->persist($posts);
            $data->flush();

            $this->addflash("notice", "Post Created Successfully");

            return $this->redirectToRoute('posts');
        }
        return $this->render('posts/create.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/update_post/{id}", name="update_post")
     */
    public function updatePost(Request $request, $id)
    {
        $posts = $this->getDoctrine()->getRepository(SymfonyPosts::class)->find($id);

        $form = $this->createForm(PostsType::class, $posts);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $this->getDoctrine()->getManager();
            $data->persist($posts);
            $data->flush();

            $this->addflash("notice", "Post Updated Successfully");

            return $this->redirectToRoute('posts');
        }
        return $this->render('posts/update.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/delete_post/{id}", name="delete_post")
     */
    public function deletePost(Request $request, $id)
    {
        $post = $this->getDoctrine()->getRepository(SymfonyPosts::class)->find($id);
        $data = $this->getDoctrine()->getManager();
        $data->remove($post);
        $data->flush();

        $this->addflash("notice", "Post Deleted Successfully");

        return $this->redirectToRoute('posts');
    }
}
