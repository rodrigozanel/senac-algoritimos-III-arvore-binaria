<?php

namespace MyDev;

use MyDev\Interfaces\NodoInterface;
use SebastianBergmann\Exporter\Exception;

class Nodo implements NodoInterface
{
    private $valor;
    private $filhoEsquerda;
    private $filhoDireita;
    private $pai;
    private $altura;

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
                $nodo->pai = $this;
            }else{
                $this->getFilhoDireita()->insereNodo($nodo);
            }
        }else{
            if(!$this->getFilhoEsquerda()) {
                $this->insereFilhoEsquerda($nodo);
                $nodo->pai = $this;
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

    public function getAltura(){
        
    }

    /**
     *

    public function getAltura(){
        if($this->getFilhoEsquerda() && $this->getFilhoDireita()){
            return $this->getFilhoEsquerda()->getAltura() - $this->getFilhoDireita()->getAltura();
        }else{
            if($this->getFilhoEsquerda()){
                return $this->getFilhoEsquerda()->getAltura();
            }else{
                return 0 - $this->getFilhoDireita()->getAltura();
            }
        }
    }
     *
     * */

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

    /**
     * @return Nodo
     */
    public function getPai()
    {
        return $this->pai;
    }

    /**
     * @param mixed $pai
     */
    public function setPai($pai)
    {
        $this->pai = $pai;
    }




}