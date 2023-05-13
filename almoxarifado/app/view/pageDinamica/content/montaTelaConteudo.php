<?php

namespace App\View\PageDinamica\Content;
use App\Persistencia\PersistenciaUsuario;

/**
 * Classe responsavel por montar todo o conteudo das paginas dinamicas.
 */
class MontaTelaConteudo {

    /**
     * Summary of getTelaConteudo
     * @param mixed $aDadosTabela
     * @param mixed $aDadosGeral
     * @return string
     */
    public static function getTelaConteudo($aDadosTabela, $aDadosGeral) {
        $aArrayNome = (new PersistenciaUsuario())->nomeUsuario($_SESSION['userid']);
        $aArray= $aArrayNome[0];
        $sHtml = '<h1 id="nomeTabela">'.$aDadosGeral['title'].' Olá '.$aArray['usunome'].'</h1>';
        $sHtml .= "<a href=".$aDadosGeral['href']."><button>".$aDadosGeral['label']."</button></a>";
        $sHtml .= '<table class="table"><thead><tr>';

        foreach ($aDadosGeral['NomeColunas'] as $aNomeCampo) {
            if ($aNomeCampo) {
                $sHtml .= '<th>' .$aNomeCampo. '</th>';
            }
        }

        $sHtml .='</tr></thead><tbody>';
        
        $sHtml .= self::tabelaAltoNivel($aDadosTabela, $aDadosGeral['NomeColunasTabela']);

        return $sHtml .='</tr></tbody>';
    }

    private static function tabelaAltoNivel($aDados, $aNomeColunaBanco) {
        $sHtml ='<tr>';
            foreach ($aDados as $aDadoCampo) {
                foreach ($aNomeColunaBanco as $sNomeColunaBanco) {
                    $sHtml .='<td>' .$aDadoCampo[$sNomeColunaBanco]. '</td>';
                }
                $sHtml .='</tr>';
            }
            return $sHtml;
    }
}