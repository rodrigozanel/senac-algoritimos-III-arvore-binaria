<?php

namespace MyDev\Interfaces;


interface ArvoreInterface
{

    public function __construct(NodoInterface $nodo);

    public function imprimir();
} 