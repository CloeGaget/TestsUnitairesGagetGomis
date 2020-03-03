<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController {
    public function index() {
        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }
}


?>