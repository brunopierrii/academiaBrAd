<?php

namespace App\Controller;

use App\Entity\Usuario;
use Doctrine\DBAL\Driver\PDO\PDOException;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

class UsuarioController extends AbstractController
{
    #[Route('/usuario', name: 'app_usuario')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UsuarioController.php',
        ]);
    }

    #[Route('/usuario/new', name: 'create_usuario')]
    public function new(EntityManagerInterface $entityManager): Response
    {
        try
        {
            $usuario = new Usuario();
            $usuario->setCodUsuario('000003');
            $usuario->setNomeUsuario('Bruno');
            $usuario->setUsuarioLogin(10072016);

            $passHash = password_hash('123123', PASSWORD_ARGON2I);

            $usuario->setSenhaUsuario($passHash);
            
            $entityManager->persist($usuario);

            $entityManager->flush();

            dump($usuario);

            $response = new Response('Saved new user with id: '.$usuario->getId());

            return $response;
        }
        catch(PDOException $e)
        {
            echo 'ERROR:'.$e->getMessage();
        }
    }

    #[Route('/usuario/{id}', name: 'usuario_show')]
    public function show(EntityManagerInterface $entityManager, int $id): Response
    {
        $usuario = $entityManager->getRepository(Usuario::class)->find($id);
        
        if($usuario)
        {
            dump($usuario);
        }


        return new Response('');
    }
}
