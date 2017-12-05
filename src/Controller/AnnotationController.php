<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 05.12.2017
 * Time: 17:08
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class AnnotationController extends Controller
{
    /**
     * @Route("/about/route")
     * @return Response
     */
    public function route()
    {
        return $this->render('lucky\route.html.twig');
    }
}