<?php
/**
 * Created by PhpStorm.
 * User: danielosoriov
 * Date: 4/20/17
 * Time: 12:33 PM
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/admin", name="admin_show")
     * @return Response
     */
    public function adminAction() {
        return $this->render(':default:adminShow.html.twig');
        //return new Response('<h1>Hola admin!</h1>');
        //$this->render('<h1>Hola Admin!</h1>')
    }
}