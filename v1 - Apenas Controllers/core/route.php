<?php
namespace Route;
use Exception;
/**
 * Classe de rotas do sistema.
 * @author David Rusycki
 * @since 31/01/2022
 */
class Route  
{
    
    private string $address;
    private object $controller;
    private string $method;

    /**
     * @param String $sAddress - Rota para redirecionamento da requisição.
     * @param Array $aInfos - Array que deve conter primeiro o controller desejado e depois um string com o método a ser chamado.
     */
    public function __construct(string $sAddress, array $aInfos)
    {
        if (is_object($aInfos[0]) && is_string($aInfos[1]) && method_exists($aInfos[0], $aInfos[1]) && count($aInfos) == 2) {
            $this->setAddress($sAddress)->setController(reset($aInfos))->setMethod(end($aInfos));
        }
        else{
            throw new Exception('Verifique as informações da rota.');
        }
    }

    /**
     * Retorna um Route com as informações setadas.
     */
    public static function set(string $sAddress, array $aInfos)
    {
        return new self($sAddress, $aInfos);
    }

    /**
     * Get the value of address
     */ 
    public function getAddress() : string
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress(string $address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of controller
     */ 
    public function getController() : object
    {
        return $this->controller;
    }

    /**
     * Set the value of controller
     *
     * @return  self
     */ 
    public function setController(object $controller)
    {
        $this->controller = $controller;

        return $this;
    }

    /**
     * Get the value of method
     */ 
    public function getMethod() : string
    {
        return $this->method;
    }

    /**
     * Set the value of method
     *
     * @return  self
     */ 
    public function setMethod(string $method)
    {
        $this->method = $method;

        return $this;
    }

}
