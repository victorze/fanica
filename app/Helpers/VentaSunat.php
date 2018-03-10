<?php

namespace App\Helpers;

use App\Venta;
use Greenter\Model\Client\Client;
use Greenter\Model\Company\Address;
use Greenter\Model\Company\Company;
use Greenter\Model\Sale\Invoice;
use Greenter\Model\Sale\Legend;
use Greenter\Model\Sale\SaleDetail;

class VentaSunat
{
    public static function factura(Venta $factura)
    {
        $invoice = new Invoice();
        $invoice
            ->setFecVencimiento($factura->fecha_vcto)
            ->setTipoDoc($factura->tipo)
            ->setSerie($factura->serie)
            ->setCorrelativo($factura->correlativo)
            ->setFechaEmision($factura->fecha_emision)
            ->setTipoMoneda($factura->moneda)
            ->setGuias([])
            ->setClient((new Client())
                ->setTipoDoc($factura->cliente->tipo_doc)
                ->setNumDoc($factura->cliente->numero_doc)
                ->setRznSocial($factura->cliente->razon_social)
                ->setAddress((new Address())
                    ->setDireccion($factura->cliente->domicilio_fiscal)))
            ->setMtoOperGravadas($factura->baseImponible())
            ->setMtoOperExoneradas(0)
            ->setMtoOperInafectas(0)
            ->setMtoIGV($factura->igv())
            ->setMtoImpVenta($factura->importeTotal())
            ->setCompany((new Company())
                ->setRuc(config('company.ruc'))
                ->setNombreComercial('company.nombre_comercial')
                ->setRazonSocial('company.razon_social')
                ->setAddress((new Address())
                    ->setDireccion('company.domicilio_fiscal')));

        $items = [];
        foreach ($factura->items as $item) {
            $detail = new SaleDetail();
            $detail->setCodProducto($item->producto->codigo)
                ->setUnidad($item->producto->unidad_medida)
                ->setCantidad($item->cantidad)
                ->setDescripcion($item->producto->descripcion)
                ->setDescuento($item->descuento)
                ->setIgv($factura->tasa_igv)
                ->setTipAfeIgv($item->afectacion_igv)
                ->setMtoValorVenta(round($item->cantidad * $item->valor_unitario, 2))
                ->setMtoValorUnitario($item->valor_unitario)
                ->setMtoPrecioUnitario(round($factura->tasa_igv * $item->valor_unitario, 2));

            $items[] = $detail;
        }

        $legend = new Legend();
        $legend->setCode('1000')
            ->setValue('SON CIEN CON 00/100 SOLES');

        $invoice->setDetails($items)
            ->setLegends([$legend]);

        return $invoice;
    }
}

