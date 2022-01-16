<?php

namespace App\Controller;

use App\Entity\Participant;
use App\Form\ParticipantFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParticipantFormController extends AbstractController
{
    #[Route('/form', name: 'participant_form')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $participant = new Participant();
        $form = $this->createForm(ParticipantFormType::class, $participant );
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
        
            $entityManager->persist($participant);
            $entityManager->flush();
            return $this->redirectToRoute('participant_form');
            
        }
        return $this->renderForm('participant_form/index.html.twig', [
            'participantForm' => $form,
        ]);
    }
}