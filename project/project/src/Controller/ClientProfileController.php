<?php

namespace App\Controller;

use App\Entity\ClientProfile;
use App\Form\ClientProfileType;
use App\Repository\ClientProfileRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/client/profile')]
#[IsGranted('ROLE_ADMIN')]
class ClientProfileController extends AbstractController
{
    #[Route('/', name: 'app_client_profile_index', methods: ['GET'])]
    public function index(ClientProfileRepository $clientProfileRepository): Response
    {
        return $this->render('client_profile/index.html.twig', [
            'client_profiles' => $clientProfileRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_client_profile_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $clientProfile = new ClientProfile();
        $form = $this->createForm(ClientProfileType::class, $clientProfile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($clientProfile);
            $entityManager->flush();

            return $this->redirectToRoute('app_client_profile_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('client_profile/new.html.twig', [
            'client_profile' => $clientProfile,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_client_profile_show', methods: ['GET'])]
    public function show(ClientProfile $clientProfile): Response
    {
        return $this->render('client_profile/show.html.twig', [
            'client_profile' => $clientProfile,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_client_profile_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ClientProfile $clientProfile, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ClientProfileType::class, $clientProfile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_client_profile_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('client_profile/edit.html.twig', [
            'client_profile' => $clientProfile,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_client_profile_delete', methods: ['POST'])]
    public function delete(Request $request, ClientProfile $clientProfile, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$clientProfile->getId(), $request->request->get('_token'))) {
            $entityManager->remove($clientProfile);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_client_profile_index', [], Response::HTTP_SEE_OTHER);
    }
}
