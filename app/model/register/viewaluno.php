<?php
namespace app\model\register;
use app\model\model;
/**
 * Description of viewaluno
 *
 * @author DanielUAC
 */
class viewaluno extends model
{
    protected $colunas =
            [
              "pri_nome",
              "ult_nome",
              "processo",
              "curso",
              "sexo",
              "idusuario",
              "curso",
              "idcurso",
              "perfil",
              "estado"
            ];
    //put your code here
    public function getJson()
    {
        return json_encode($this->selects());
    }

}
