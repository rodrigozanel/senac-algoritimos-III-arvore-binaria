<?php

namespace MyDev;

use MyDev\Interfaces\NodoInterface;
use SebastianBergmann\Exporter\Exception;

class Nodo implements NodoInterface
{
    private $valor;
    private $filhoEsquerda;
    private $filhoDireita;

    /**
     * @param int $val
     */
    public function __construct($val)
    {
        if(!is_numeric($val)){
            throw new Exception('O valor de $var precisa ser um inteiro.');
        }
        $this->valor = $val;
    }

    public function imprimir()
    {

    }

    /**
     * @param NodoInterface $nodo
     */
    public function insereNodo(NodoInterface $nodo){
        if($nodo->getValor() > $this->getValor()){
            if(!$this->getFilhoDireita()) {
                $this->insereFilhoDireita($nodo);
            }else{
                $this->getFilhoDireita()->insereNodo($nodo);
            }
        }else{
            if(!$this->getFilhoEsquerda()) {
                $this->insereFilhoEsquerda($nodo);
            }else{
                $this->getFilhoEsquerda()->insereNodo($nodo);
            }
        }
    }

    /**
     * @param NodoInterface $nodo
     */
    private function insereFilhoEsquerda(NodoInterface $nodo)
    {
        $this->filhoEsquerda = $nodo;
    }

    /**
     * @param NodoInterface $nodo
     */
    private function insereFilhoDireita(NodoInterface $nodo)
    {
        $this->filhoDireita = $nodo;
    }

    /**
     * @return int mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @return Nodo
     */
    public function getFilhoDireita()
    {
        return $this->filhoDireita;
    }

    /**
     * @return Nodo
     */
    public function getFilhoEsquerda()
    {
        return $this->filhoEsquerda;
    }




}