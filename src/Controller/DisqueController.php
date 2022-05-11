<?php

namespace App\Controller;

use App\Entity\Disque;
use App\Form\DisqueType;
use App\Repository\DisqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
#[Route('/disque')]
class DisqueController extends AbstractController
{
    #[Route('/', name: 'app_disque_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $disques = $entityManager
            ->getRepository(Disque::class)
            ->findAll();

        return $this->render('disque/index.html.twig', [
            'disques' => $disques,
        ]);
    }

    #[Route('/new', name: 'app_disque_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $disque = new Disque();
        $form = $this->createForm(DisqueType::class, $disque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($disque);
            $entityManager->flush();

            return $this->redirectToRoute('app_disque_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('disque/new.html.twig', [
            'disque' => $disque,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_disque_show', methods: ['GET'])]
    public function show(Disque $disque): Response
    {
        return $this->render('disque/show.html.twig', [
            'disque' => $disque,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_disque_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Disque $disque, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DisqueType::class, $disque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_disque_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('disque/edit.html.twig', [
            'disque' => $disque,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_disque_delete', methods: ['POST'])]
    public function delete(Request $request, Disque $disque, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$disque->getId(), $request->request->get('_token'))) {
            $entityManager->remove($disque);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_disque_index', [], Response::HTTP_SEE_OTHER);
    }
}
