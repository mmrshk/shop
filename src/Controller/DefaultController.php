<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 05.12.2017
 * Time: 17:08
 */
namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function show(SessionInterface $session)
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/to-about")
     */
    public function redirectToShow()
    {
        return $this->redirectToRoute('about_show');
    }

}