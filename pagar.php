<?php

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

if(!isset($_POST['producto'], $_POST['precio'])){
        exit("Hubo un error");
    }

    require 'config.php';

    $producto = htmlspecialchars($_POST['producto']);
    $precio = htmlspecialchars($_POST['precio']);
    $precio = (int)$precio;
    $envio = 0;
    $total = $precio + $envio;

    $compra = new Payer();
    $compra->setPaymentMethod('paypal');

    $articulo = new Item();
    $articulo->setName($producto)
             ->setCurrency('MXN')
             ->setQuantity(1)
             ->setPrice($precio);

    $listaArticulos = new ItemList();
    $listaArticulos->setItems(array($articulo));

    $detalles = new Details();
    $detalles->setShipping($envio)
             ->setSubtotal($precio);

    $cantidad = new Amount();
    $cantidad->setCurrency('MXN')
             ->setTotal($precio)
             ->setDetails($detalles);

    $transaccion = new Transaction();
    $transaccion->setAmount($cantidad)
                ->setItemList($listaArticulos)
                ->setDescription('Pago ')
                ->setInvoiceNumber(uniqid());

    $redireccionar = new RedirectUrls();
    $redireccionar->setReturnUrl(URL_SITIO . "/pago_finalizado.php?exito=true")
                  ->setCancelUrl(URL_SITIO . "/pago_finalizado.php?exito=false");

    echo $redireccionar->getReturnUrl();