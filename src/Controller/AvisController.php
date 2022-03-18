<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\AvisType;
use App\Repository\AvisRepository;
use App\Repository\ProduitRepository;
use Doctrine\DBAL\Types\DateImmutableType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

#[Route('/avis')]
#[IsGranted("ROLE_ADMIN")]
class AvisController extends AbstractController
{


    #[Route('/new/{pid}', name: 'avis_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager,int $pid,ProduitRepository $produitRepository): Response
    {
        $avis = new Avis();
        $date = new \DateTime();
        $avis->setDateAvis($date);
        $avis->setProduit($produitRepository->find($pid));
        $form = $this->createForm(AvisType::class, $avis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($avis);
            $entityManager->flush();

            return $this->redirectToRoute('avis_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('avis/new.html.twig', [
            'avis' => $avis,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'avis_show', methods: ['GET'])]
    public function show(Avis $avi): Response
    {
        return $this->render('avis/show.html.twig', [
            'avi' => $avi,
        ]);
    }

    #[Route('/{id}/edit', name: 'avis_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Avis $avi, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AvisType::class, $avi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('avis_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('avis/edit.html.twig', [
            'avi' => $avi,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'avis_delete', methods: ['POST'])]
    public function delete(Request $request, Avis $avi, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$avi->getId(), $request->request->get('_token'))) {
            $entityManager->remove($avi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('avis_index', [], Response::HTTP_SEE_OTHER);
    }
}
