<?php

namespace App\Users\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/users')]
class AdminOrderController extends AbstractController
{
    #[Route('/admin/order', name: 'app_admin_order_index')]
    public function index(): Response
    {
        return $this->render('users/admin_order/index.html.twig');
    }

    #[Route('/admin/order/update/{id}', name: 'app_admin_order_update')]
    public function update(int $id): Response
    {
        return $this->render('users/admin_order/update.html.twig');
    }

    #[Route('/admin/order/delete/{id}', name: 'app_admin_order_delete')]
    public function delete(int $id): Response
    {
        return $this->render('users/admin_order/delete.html.twig');
    }

    #[Route('/admin/order/view/{id}', name: 'app_admin_order_view')]
    public function view(int $id): Response
    {
        return $this->render('users/admin_order/view.html.twig');
    }
}
