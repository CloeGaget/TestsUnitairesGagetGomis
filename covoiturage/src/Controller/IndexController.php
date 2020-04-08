<?php
namespace App\Controller;

use App\Entity\User;
use App\Form\UsagerType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController {
    public function index() {
        return $this->render('homepage.html.twig');
    }

    public function homepageLinkConnexion() {
        return $this->redirectToRoute('login');
    }
    
    
    public function homepageLinkRegister(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response {
        $usager = new User();
        $form = $this->createForm(UsagerType::class, $usager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Encryptage du mot de passe
            $usager->setPassword($passwordEncoder->encodePassword($usager,$usager->getPassword()));
            // Définition du rôle
            $usager->setRoles(["ROLE_CLIENT"]);
                       
            return $this->redirectToRoute('index');
        }
    }
    
    public function homepageLinkResearchTrajet() {
        return $this->render('recherche.html.twig');
    }
     
}


?>