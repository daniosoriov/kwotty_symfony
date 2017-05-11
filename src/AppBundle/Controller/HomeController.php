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
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * @Route("", name="home_show")
     * @return Response
     */
    public function showHomepage() {
        $quote_day = ['quote' => 'You can fool some of the people all of the time, and all of the people some of the time, but you can not fool all of the people all of the time.', 'author' => 'Abraham Lincoln'];

        $quotes = [
            ['quote' => 'Our new Constitution is now established, everything seems to promise it will be durable; but, in this world, nothing is certain except death and taxes.', 'author' => 'Benjamin Franklin'],
            ['quote' => 'For 50 years, WWF has been protecting the future of nature. The world\'s leading conservation organization, WWF works in 100 countries and is supported by 1.2 million members in the United States and close to 5 million globally.', 'author' => 'From WWF'],
            ['quote' => 'Associate with men of good quality if you esteem your own reputation; for it is better to be alone than in bad company.', 'author' => 'George Washington'],
        ];

        return $this->render('home.html.twig', [
            'quote_day' => $quote_day,
            'quotes' => $quotes,
        ]);
    }
}