<?php

namespace App\Helpers;

class StringHelper
{
    static function removeCaracteresEspeciais(string $str) : string
    {
        return preg_replace("/[^0-9]/", "", $str);
    }

    static function obterStringFormatada($str, $mascara)
    {
        $retorno = '';
        $k = 0;
        for($i = 0; $i <= strlen($mascara) - 1; $i++)
        {
            if($mascara[$i] == '#')
            {
                if(isset($str[$k]))
                    $retorno .= $str[$k++];
            }
            else
            {
                if(isset($mascara[$i]))
                    $retorno .= $mascara[$i];
            }
        }
        return $retorno;
    }

    static function obterTelefoneFormatado(string $telefone) : string
    {
        switch (strlen($telefone)) {
            case 8://fixo sem ddd
                return obterStringFormatada(trim($telefone), '####-####');
            case 9://celular sem ddd
                return obterStringFormatada(trim($telefone), '#####-####');
            case 10://fixo com ddd
                return obterStringFormatada(trim($telefone), '(##) ####-####');
            case 11://celular com ddd
                return obterStringFormatada(trim($telefone), '(##) #####-####');
            default:
                return trim($telefone);
        }
    }

    static function obterQuebraDeLinhaNoHtml(string $str) : string
    {
        return str_replace("\n", '<br />', $str);
    }

    static function obterCepFormatado(string $cep) : string
    {
        if ($cep != null && $cep != '')
            return self::obterStringFormatada(self::removeCaracteresEspeciais($cep), '#####-###');
        return "";
    }
}
