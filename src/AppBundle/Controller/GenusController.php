<?php
/**
 * Created by PhpStorm.
 * User: danielosoriov
 * Date: 3/23/17
 * Time: 12:34 PM
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GenusController extends Controller
{
    /**
     * @Route("/genus", name="genus_list")
     */
    public function listAction() {
        return $this->render('genus/list.html.twig');
    }

    /**
     * @Route("/genus/{genusName}", name="genus_show")
     */
    public function showAction($genusName) {
        $notes = [
            'first line',
            'second line',
            'third line',
        ];
        return $this->render('genus/show.html.twig', [
            'name' => $genusName,
            'notes' => $notes,
        ]);
    }
}