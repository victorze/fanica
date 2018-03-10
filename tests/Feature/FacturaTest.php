<?php

namespace Tests\Feature;

use App\Helpers\VentaSunat;
use Greenter\Ws\Services\SunatEndpoints;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FacturaTest extends TestCase
{
    use RefreshDatabase;

    public function test_enviar_factura_a_sunat()
    {
        $facturaSunat = VentaSunat::factura($this->factura());

        $util = \App\Helpers\Util::getInstance();
        $see = $util->getSee(SunatEndpoints::FE_BETA);
        $response = $see->send($facturaSunat);

        $this->assertTrue($response->isSuccess());
        $this->assertNotNull($response->getCdrResponse());
        $this->assertContains('La Factura numero F001-00000001, ha sido aceptada',
            $response->getCdrResponse()->getDescription());
    }

    private function factura()
    {
        factory(\App\Cliente::class)->create();

        $factura = factory(\App\Venta::class)->create([
            'cliente_id' => \App\Cliente::find(1)->id,
            'serie' => 'F001',
            'correlativo' => '00000001',
        ]);

        factory(\App\Producto::class, 2)->create();

        factory(\App\VentaItem::class)->create([
            'venta_id' => \App\Venta::find(1)->id,
            'producto_id' => \App\Producto::find(1)->id,
        ]);

        factory(\App\VentaItem::class)->create([
            'venta_id' => \App\Venta::find(1)->id,
            'producto_id' => \App\Producto::find(2)->id,
        ]);

        return $factura;
    }
}
