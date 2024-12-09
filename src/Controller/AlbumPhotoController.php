<?php

namespace App\Controller;

use App\Entity\AlbumPhoto;
use App\Form\AlbumPhotoType;
use App\Repository\AlbumPhotoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/album/photo')]
final class AlbumPhotoController extends AbstractController
{
    #[Route(name: 'app_album_photo_index', methods: ['GET'])]
    public function index(AlbumPhotoRepository $albumPhotoRepository): Response
    {
        return $this->render('album_photo/index.html.twig', [
            'album_photos' => $albumPhotoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_album_photo_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $albumPhoto = new AlbumPhoto();
        $form = $this->createForm(AlbumPhotoType::class, $albumPhoto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($albumPhoto);
            $entityManager->flush();

            return $this->redirectToRoute('app_album_photo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('album_photo/new.html.twig', [
            'album_photo' => $albumPhoto,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_album_photo_show', methods: ['GET'])]
    public function show(AlbumPhoto $albumPhoto): Response
    {
        return $this->render('album_photo/show.html.twig', [
            'album_photo' => $albumPhoto,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_album_photo_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AlbumPhoto $albumPhoto, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AlbumPhotoType::class, $albumPhoto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_album_photo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('album_photo/edit.html.twig', [
            'album_photo' => $albumPhoto,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_album_photo_delete', methods: ['POST'])]
    public function delete(Request $request, AlbumPhoto $albumPhoto, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$albumPhoto->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($albumPhoto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_album_photo_index', [], Response::HTTP_SEE_OTHER);
    }
}
