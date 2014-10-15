<?php

use MyDev\Nodo;

class NodoTest extends PHPUnit_Framework_TestCase{

    public function testCriaNodoCorretamente(){
        $val = 10;
        $nodo = new Nodo($val);

        $this->assertEquals($nodo->getValor(), $val);
    }

    public function testInsereNodoDireitaCorretamente(){
        $nodo = new Nodo(10);
        $nodoFilho = new Nodo(15);
        $nodo->insereNodo($nodoFilho);

        $this->assertEquals($nodoFilho, $nodo->getFilhoDireita());
    }

    public function testInsereNodoEsquerdaCorretamente(){
        $nodo = new Nodo(10);
        $nodoFilho = new Nodo(9);
        $nodo->insereNodo($nodoFilho);

        $this->assertEquals($nodoFilho, $nodo->getFilhoEsquerda());
        $this->assertEquals(9, $nodo->getFilhoEsquerda()->getValor());
    }

    public function testGetAlturaCorretamente(){
        $nodo = new Nodo(10);
        $n1 = new Nodo(12);
        $n2 = new Nodo(6);
        $n3 = new Nodo(9);
        $n4 = new Nodo(4);

        $nodo->insereNodo($n1);
        $nodo->insereNodo($n2);
        $nodo->insereNodo($n3);
        $nodo->insereNodo($n4);


    }

    public function testGetPaiCorretamente(){
        $nodo = new Nodo(10);
        $nodoFilhoDireita = new Nodo(12);
        $nodoQualquer = new Nodo(213);
        $nodo->insereNodo($nodoFilhoDireita);
        $this->assertEquals($nodoFilhoDireita->getPai(), $nodo);
        $this->assertNotEquals($nodoFilhoDireita->getPai(), $nodoQualquer);
    }

    public function testInsereNetosCorretamenteNoFilhoDaEsquerda(){
        $nodo = new Nodo(10);
        $nodoFilho = new Nodo(8);
        $nodoNeto = new Nodo(6);
        $nodoNeto2 = new Nodo(9);

        $nodo->insereNodo($nodoFilho);
        $nodo->insereNodo($nodoNeto);
        $nodo->insereNodo($nodoNeto2);

        $this->assertEquals($nodoFilho, $nodo->getFilhoEsquerda());
        $this->assertEquals($nodoNeto, $nodo->getFilhoEsquerda()->getFilhoEsquerda());
        $this->assertEquals(6, $nodo->getFilhoEsquerda()->getFilhoEsquerda()->getValor());
        $this->assertEquals(9, $nodo->getFilhoEsquerda()->getFilhoDireita()->getValor());
    }

    public function testInsereNetosCorretamenteNoFilhoDaEsquerda2(){
        $nodo = new Nodo(10);
        $nodoFilho = new Nodo(8);
        $nodoFilho2 = new Nodo(12);
        $nodoNeto = new Nodo(6);
        $nodoNeto2 = new Nodo(9);

        $nodo->insereNodo($nodoFilho);
        $nodo->insereNodo($nodoNeto);
        $nodo->insereNodo($nodoNeto2);
        $nodo->insereNodo($nodoFilho2);

        $this->assertEquals($nodoFilho, $nodo->getFilhoEsquerda());
        $this->assertEquals($nodoNeto, $nodo->getFilhoEsquerda()->getFilhoEsquerda());
        $this->assertEquals(6, $nodo->getFilhoEsquerda()->getFilhoEsquerda()->getValor());
        $this->assertEquals(9, $nodo->getFilhoEsquerda()->getFilhoDireita()->getValor());
        $this->assertEquals(12, $nodo->getFilhoDireita()->getValor());
    }
}