<?php
/**
 * Created by PhpStorm.
 * User: danielosoriov
 * Date: 4/6/17
 * Time: 12:10 PM
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("", name="home_show")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showHomepage() {
        return $this->render('home.html.twig');
    }
}