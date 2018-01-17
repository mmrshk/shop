<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 15.01.2018
 * Time: 9:44
 */

namespace App\Controller;



use App\Entity\Product;
use App\Service\Orders;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OrderController extends Controller
{
    /**
     * @Route("order/add-product/{id}/{count}", name="order_add_product",
     *     requirements={"id":"\d+", "count":"\d+(\.\d+)?"})
     */
    public function addProduct(Product $product,float $count, Orders $orders, Request $request)
    {
        $orders->addProduct($product, $count);

        return $this->redirect($request->headers->get('referer'));
    }

    /**
     * @Route("cart", name = "order_cart")
     */
    public function showCart(Orders $orders)
    {
        return $this->render('order/cart.html.twig',  ['order' => $orders->getCurrentOrder()]);
    }
}