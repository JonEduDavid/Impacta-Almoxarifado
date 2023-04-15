<?php

namespace App\View;

use App\View\PageDinamica\Content\montaTelaConteudo;

/**
 * Classe resposavel pela renderizacao das tela do sistema.
 */
class ViewPadrao {

    /**
     * Summary of montaTelaConteudo
     * @param array $aDados
     * @param array $aNomeColunas
     * @return 
     */
    public function montaTelaConteudo($sNomeTela, $aDados, $aNomeColunas, $aNomeColunaBanco) {
        return MontaTelaConteudo::getTelaConteudo($sNomeTela, $aDados, $aNomeColunas , $aNomeColunaBanco);
    }
    
    /**
     * Metodo responsavel por retornar o conteudo de uma View.
     * 
     * @param string $sNomeView
     * @return bool
     */
    public static function getContentView($sNomeView) {
        $file = __DIR__.'/../view/'.$sNomeView.'.html';
        return file_exists($file) ? file_get_contents($file) : $sNomeView;
    }


    /**
     * Metodo responsavel por retornar renderizado de uma View de page completa.
     * Ex: Tela de Login.
     * 
     * @param string $sNomeView
     * @return string
     */
    public static function renderPageCompleta($sNomeView) {
        //Conteudo da View.
        $contentView = self::getContentView($sNomeView);
        return $contentView;
    }


    /**
     * Metodo responsavel por retornar renderizado de uma View de page dinamica.
     * Ex: Tela de Usuario.
     * 
     * @param string $sNomeView
     * @param array $aConteudoPage
     * @return array|string
     */
    public static function renderPageDinamica($sNomeView, $aConteudoPage = []) {
        //Conteudo da View.
        $contentView = self::getContentView($sNomeView);

        $aChaves = array_keys($aConteudoPage);
        $aChaves = array_map(function($aConteudoItem){
            return '{{'.$aConteudoItem.'}}';
        }, $aChaves);

        return str_replace($aChaves,array_values($aConteudoPage), $contentView);
    }
}
