<?php
/**
 * Created by PhpStorm.
 * User: danielosoriov
 * Date: 5/11/17
 * Time: 5:41 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Quote;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;

class QuoteController extends Controller
{
    /**
     * @Route("/kwotty", name="quote_list")
     * @return Response
     */
    public function listAction() {
        $quotes = $this->getDoctrine()
            ->getRepository('AppBundle:Quote')
            ->findAll();
        return $this->render(':quote:list.html.twig', ['quotes' => $quotes]);
    }

    /**
     * @Route("/kwotty/new", name="quote_new")
     * @return Response
     */
    public function newAction() {
        $quote = new Quote();
        $quote->setUserId(1);
        $quote->setQuote('This is the new quote');

        $form = $this->createFormBuilder($quote)
            ->add('quote', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Create quote'])
            ->getForm();

        return $this->render(':quote:new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}