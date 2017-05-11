<?php
/**
 * Created by PhpStorm.
 * User: danielosoriov
 * Date: 5/11/17
 * Time: 5:23 PM
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Product;


class ProductController extends Controller
{
    /**
     * @Route("/product/new", name="product_create")
     * @return Response
     */
    public function createProductAction() {
        $product = new Product();
        $product->setName('Hola!');
        $product->setPrice(19.99);
        $product->setDescription('The description');

        $em = $this->getDoctrine()->getManager();

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved new product with id '. $product->getId() .' and name: '. $product->getName());
    }

    /**
     *
     * You can achieve the equivalent of this without writing any code by using the @ ParamConverter shortcut.
     * See the FrameworkExtraBundle documentation for more details.
     * https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/annotations/converters.html
     *
     * @Route("/product/{productId}")
     * @param $productId int the product Id.
     * @return Response
     */
    public function showProductAction($productId) {
        /*
         * $repository = $this->getDoctrine()->getRepository('AppBundle:Product');
         *
         * // query for a single product by its primary key (usually "id")
         * $product = $repository->find($productId);
         *
         * // dynamic method names to find a single product based on a column value
         * $product = $repository->findOneById($productId);
         * $product = $repository->findOneByName('Keyboard');
         *
         * // dynamic method names to find a group of products based on a column value
         * $products = $repository->findByPrice(19.99);
         *
         * // find *all* products
         * $products = $repository->findAll();
         *
         * // query for a single product matching the given name and price
         * $product = $repository->findOneBy(
         *     array('name' => 'Keyboard', 'price' => 19.99)
         * );
         *
         * // query for multiple products matching the given name, ordered by price
         * $products = $repository->findBy(
         *     array('name' => 'Keyboard'),
         *     array('price' => 'ASC')
         * );
         */
        $product = $this->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->find($productId);
        if (!$product) {
            throw $this->createNotFoundException('Not product found for id: '. $productId);
        }

        return new Response('The product name: '. $product->getName() .
            ', the price: '. $product->getPrice() .
            ', the description: '. $product->getDescription()
        );
    }

    /**
     * @Route("product/{productId}/update", name="product_update")
     * @param $productId int the product id
     * @return Response
     */
    public function updateProductAction($productId) {
        $em = $this->getDoctrine()->getManager();

        $repository = $this->getDoctrine()->getRepository('AppBundle:Product');
        $product = $repository->find($productId);

        if (!$product) {
            throw $this->createNotFoundException();
        }

        $product->setName('New name!');
        $em->flush();

        return new Response('Product '. $productId .'updated with name: '. $product->getName());
    }

    /**
     * @Route("product/{productId}/delete", name="product_delete")
     * @param $productId
     * @return Response
     */
    public function deleteProductAction($productId) {
        $em = $this->getDoctrine()->getManager();

        $product = $this->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->find($productId);

        if (!$product) {
            throw $this->createNotFoundException();
        }

        $em->remove($product);
        $em->flush();

        return new Response('Product '. $productId .' deleted!');
    }

    /**
     * @Route("products")
     * @return Response
     */
    public function listProductAction() {
        /*$em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT p
            FROM AppBundle:Product p
            WHERE p.id > 0 AND
              p.price > :price
            ORDER BY p.price ASC'
        )->setParameter('price', 1);

        $products = $query->getResult();


        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Product');

        // createQueryBuilder() automatically selects FROM AppBundle:Product
        // and aliases it to "p"
        $query = $repository->createQueryBuilder('p')
            ->where('p.price > :price')
            ->setParameter('price', '19.99')
            ->orderBy('p.price', 'ASC')
            ->getQuery();

        $products = $query->getResult();
        // to get just one result:
        // $product = $query->setMaxResults(1)->getOneOrNullResult();

        */

        $products = $this->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->findAll();

        return $this->render(':product:list.html.twig', ['products' => $products]);
    }

}