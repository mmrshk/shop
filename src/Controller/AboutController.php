<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 05.12.2017
 * Time: 20:03
 */

namespace App\Controller;

use App\Entity\Feedback;
use App\Form\FeedbackType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class AboutController extends Controller
{
    /**
     * @Route("/about", name="about_show")
     */
    public function show(SessionInterface $session)
    {
        $url = $this->generateUrl('category_show',
            [
                'slug'=>'notebooks',
                'param'=>'getparam',
            ], UrlGeneratorInterface::ABSOLUTE_URL);
        return $this->render('about/show.html.twig',
            [
                'notebooksUrl'=>$url,
                'lastCategory'=> $session->get('lastVisitedCategory')
            ]);
    }

    /**
     * @Route("/to-about")
     */
    public function redirectToShow()
    {
        return $this->redirectToRoute('about_show');
    }

    /**
     * @Route("/feedback", name = "feedback")
     *
     * @param  Request $reguest
     */
    public function feedback(Request $request, EntityManagerInterface $em, \Swift_Mailer $mailer)
    {
        $feedback = new Feedback();
        $form = $this->createForm(FeedbackType::class, $feedback);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($feedback);
            $em->flush();
            $this->addFlash('info', 'Спасибо за обращение');
            $message = (new \Swift_Message('Hello Email'))
                ->setFrom([getenv('MAILER_FROM')=>getenv('MAILER_FROM_NAME')])
                ->setTo(getenv('ADMIN_EMAIL'))
                ->setBody(
                    $this->renderView(
                        'about/message.html.twig',
                        array('feedback' => $feedback)
                    ),
                    'text/html'
                );
            $mailer->send($message);

            return $this->redirectToRoute('feedback');
        }
        return $this->render('about/feedback.html.twig', ['form'=>$form->createView(),
                ]
            );

    }

}