<?php

namespace App\View\PageDinamica\Content;
use App\Persistencia\PersistenciaUsuario;

/**
 * Classe responsavel por montar todo o conteudo das paginas dinamicas.
 */
class MontaTelaConteudo {

    /**
     * Summary of getTelaConteudo
     * @param mixed $sNomeTela
     * @param mixed $aDados
     * @param mixed $aPersistenciaNomeCampos
     * @param mixed $aNomeColunaBanco
     * @return string
     */
    public static function getTelaConteudo($sNTelaHtelaLtela, $aDados, $aPersistenciaNomeCampos, $aNomeColunaBanco) {
        $aArrayNome = (new PersistenciaUsuario())->nomeUsuario($_SESSION['userid']);
        $aArray= $aArrayNome[0];
        $sHtml = '<h1 id="nomeTabela">'.$sNTelaHtelaLtela['title'].' Olá '.$aArray['usunome'].'</h1>';
        $sHtml .= "<a href=".$sNTelaHtelaLtela['href']."><button>".$sNTelaHtelaLtela['label']."</button></a>";
        $sHtml .= '<table class="table"><thead><tr>';

        foreach ($aPersistenciaNomeCampos as $aNomeCampo) {
            if ($aNomeCampo) {
                $sHtml .= '<th>' .$aNomeCampo. '</th>';
            }
        }

        $sHtml .='</tr></thead><tbody>';
        
        if($aTipoUsu = (new PersistenciaUsuario())->tipoUsuarioLogado()) {
            $aCodigoUsu = $aTipoUsu[0];
            $sCodigo = (string) $aCodigoUsu['usucodigopermisao'];
            if ($sCodigo === "1") {
                $sHtml .= self::tabelaAltoNivel($aDados, $aNomeColunaBanco);
            } elseif ($sCodigo === "2") {
                $sHtml .= self::tabelaMedioNivel($aDados, $aNomeColunaBanco);
            } elseif ($sCodigo === "3") {
                $sHtml .= self::tabelaBaixoNivel($aDados, $aNomeColunaBanco);
            } else {
            return 'Nao encontrado o tipo de usuario, ocodigo do usuario: '. $sCodigo;
            }
        }
        return $sHtml .='</tr></tbody>';
    }

    private static function tabelaAltoNivel($aDados, $aNomeColunaBanco) {
        $sHtml ='<tr>';
        if ($aDados == null) {
            foreach ($aDados as $aDadoCampo) {
                foreach ($aNomeColunaBanco as $sNomeColunaBanco) {
                    $sHtml .='<td>' .$aDadoCampo[$sNomeColunaBanco]. '</td>';
                }
                $sHtml .='</tr>';
            }
            return $sHtml;
        }
    }

    private static function tabelaMedioNivel($aDados, $aNomeColunaBanco) {
        $sHtml ='<tr>';
        foreach ($aDados as $aDadoCampo) {
            foreach ($aNomeColunaBanco as $sNomeColunaBanco) {
                $sHtml .='<td>' .$aDadoCampo[$sNomeColunaBanco]. '</td>';
            }
            $sHtml .='</tr>';
        }
        return $sHtml;
    }

    private static function tabelaBaixoNivel($aDados, $aNomeColunaBanco) {
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