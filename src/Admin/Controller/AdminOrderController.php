<?php

namespace App\Admin\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminOrderController extends AbstractController
{
    #[Route('/admin/order', name: 'app_admin_order_index')]
    public function index(): Response
    {
        return $this->render('admin_order/index.html.twig');
    }

    #[Route('/admin/order/update/{id}')]
    public function update(int $id): Response
    {
        return $this->render('admin_order/update.html.twig');
    }

    #[Route('/admin/order/delete/{id}')]
    public function delete(int $id): Response
    {
        return $this->render('admin_order/delete.html.twig');
    }

    #[Route('/admin/order/view/{id}')]
    public function view(int $id): Response
    {
        return $this->render('admin_order/view.html.twig');
    }
}