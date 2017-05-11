<?php
/**
 * Created by PhpStorm.
 * User: danielosoriov
 * Date: 3/23/17
 * Time: 12:34 PM
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

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
     * @param $genusName mixed name of the genus.
     * @return Response the response
     */
    public function showAction($genusName) {
        return $this->render('genus/show.html.twig', [
            'name' => $genusName,
        ]);
    }

    /**
     * @Route("/genus/{genusName}/notes", name="genus_notes")
     * @Method("GET")
     */
    public function getNotesAction($genusName) {
        $notes = [
            ['id' => 1, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Octopus asked me a riddle, outsmarted me', 'date' => 'Dec. 10, 2015'],
            ['id' => 2, 'username' => 'AquaWeaver', 'avatarUri' => '/images/ryan.jpeg', 'note' => 'I counted 8 legs... as they wrapped around me', 'date' => 'Dec. 1, 2015'],
            ['id' => 3, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Inked!', 'date' => 'Aug. 20, 2015'],
        ];
        $data = [
            'notes' => $notes
        ];
        return new JsonResponse($data);
    }
}