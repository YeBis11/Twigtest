<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserProfileController extends AbstractController
{
    #[Route('/user/profile/{id}', name: 'user_profile')]
    public function index($id, EntityManagerInterface $entityManager): Response
    {
        $participantsRepository = $entityManager->getRepository('App:Participant');
        $participant = $participantsRepository->find($id);
        return $this->render('user_profile/index.html.twig', [
            'controller_name' => 'UserProfileController',
            'user' => $participant,
        ]);
    }
}