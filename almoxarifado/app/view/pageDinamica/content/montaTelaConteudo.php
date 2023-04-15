<?php

namespace App\View\PageDinamica\Content;

/**
 * 
 */
class MontaTelaConteudo {

    public static function getTelaConteudo($sNomeTela, $aDados, $aPersistenciaNomeCampos, $aNomeColunaBanco) {

        $iFlag = 0;
        // var_dump($aPersistenciaNomeCampos);
        $sHtml = '<h1 id="nomeTabela">'.$sNomeTela.'</h1>';
        // $sHtml .= '<button href="index.php?pag=cadastroUsuario">Incluir Usuario</button>';

        $sHtml .= '<table class="table"><thead><tr>';

       foreach ($aPersistenciaNomeCampos as $aNomeCampo) {
            if ($aNomeCampo) {
                $sHtml .= '<th>' .$aNomeCampo. '</th>';
            }
        }

        $sHtml .='</tr></thead><tbody>';
        
        foreach ($aDados as $aDadoCampo) {
            $sHtml .='<tr>';
            foreach ($aNomeColunaBanco as $sNomeColunaBanco) {
                $sHtml .='<td>' .$aDadoCampo[$sNomeColunaBanco]. '</td>';
            }
            $sHtml .='</tr>';
        }

        return $sHtml .='</tr></tbody>';
    }
}