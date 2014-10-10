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