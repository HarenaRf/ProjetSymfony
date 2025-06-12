<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserController extends AbstractController
{
    #[Route('/user/dashboard', name: 'user_dashboard')]
    public function index(): Response
    {
        return $this->render('user/dashboard.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
