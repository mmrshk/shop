<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 01.12.2017
 * Time: 20:45
 */

namespace App\Controller;



use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LuckyController extends Controller
{

    /**
     * @Route("/lucky/number")
     * @return Response
     */
    public function number()
    {
        $number = mt_rand(1,100);

        return $this->render('lucky/number.html.twig', array(
            'number' => $number,
        ));

    }
}