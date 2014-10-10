<?php


namespace MyDev\Interfaces;


interface NodoInterface
{
    public function __construct($val);

    public function insereNodo(NodoInterface $nodo);

    public function getValor();

    public function getFilhoDireita();

    public function getFilhoEsquerda();

    public function imprimir();

} 