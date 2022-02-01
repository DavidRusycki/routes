<?php
namespace Route;
/**
 * Classe que define as direções do sistema.
 * @author David Rusycki
 * @since 31/01/2022
 */
class Direction  
{
    /**
     * Define as rotas e os controllers
     * @return Boolean - Indicando que deu sucesso.
     */
    public static function define(array $aRoutes) : bool
    {
        return self::fingRouteAndRedirect($aRoutes, self::getUrl());
    }

    /**
     * Retorna a URL atual da página.
     * @return String - URL
     */
    private static function getUrl() : string
    {
        return "$_SERVER[REQUEST_URI]";
    }

    /**
     * @return Bool - Indicando que teve sucesso.
     */
    private static function fingRouteAndRedirect($aRoutes, $sUrl) : bool
    {
        $bFound = false;
        foreach($aRoutes as $oRoute) {
            /** @var Route $oRoute */
            if ($oRoute->getAddress() == $sUrl) {
                $bFound = true;
                $oSubject = $oRoute->getController();
                $sMethod = $oRoute->getMethod();
                break;
            }
        }
        if ($bFound) {
            $oSubject->{$sMethod}();
        }
        else {
            echo '404 Not Found';
        }

        return true;
    }

}
