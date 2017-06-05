<?php namespace App;

use App\CaoUsuario;
use App\CaoFatura;
use App\CaoSalario;
use Illuminate\Support\Facades\DB;



trait TraitConsultores {
    public function getConsultores()    {
	 $consultores = CaoUsuario::join('permissao_sistema', 'cao_usuario.co_usuario', '=', 'permissao_sistema.co_usuario')
                       ->select('cao_usuario.co_usuario', 'cao_usuario.no_usuario', 'cao_usuario.ds_senha',
                                'cao_usuario.co_usuario_autorizacao', 'cao_usuario.nu_matricula',
                                'cao_usuario.dt_nascimento')
                       ->where('permissao_sistema.co_sistema', '=', 1)
                       ->where('permissao_sistema.in_ativo', '=', 'S')
                       ->whereIn('permissao_sistema.co_tipo_usuario',  [0,1,2])
                       ->get();
        return $consultores;
    }

   // Método para consultar el desempemño del consultor
   //public function getDesempeno($consultor, $date1, $date2 )  {
   public function getDesempeno($consultor, $date1, $date2)  {

        $desempeno = CaoFatura::join('cao_os', 'cao_fatura.co_os', '=', 'cao_os.co_os')
                    ->select(DB::raw('sum(valor-(valor*total_imp_inc/100)) as receita'),
                             DB::raw('sum((valor-(valor*total_imp_inc/100)) * (comissao_cn/100)) as comissao'),
                             DB::raw('YEAR(data_emissao) as anho'), 
                             DB::raw('MONTH(data_emissao) as mes'))
                   ->where('cao_os.co_usuario', '=', $consultor)
                   ->where('cao_fatura.data_emissao', '>=', $date1)
                   ->where('cao_fatura.data_emissao', '<=', $date2)
                   ->groupBy('anho', 'mes')
                   ->orderBy('anho', 'mes')->get();
      
     // if ($rs->num_rows()>0){
          return $desempeno;
     // }else {
     //   return null;
     // }
  }

      public function getCostofijo($consultor) {
      $costoFijo = CaoSalario::select('brut_salario as salario')
                             ->where('co_usuario', '=', $consultor)->first();
      //if ($rs->num_rows()>0){
       // return $rs->row(); 
        return $costoFijo;
      //}else {
      //  return null;
      //}
  }

      public function getDia($mes){
        $dia = "";
        switch ($mes){
            case 1;
            case 3;
            case 5;
            case 7;
            case 8;
            case 10;
            case 12;
              $dia = 31;
              break;
            case 2;
              $dia = 28;
              break;
            otherwise;
              $dia = 30;
        }
        return $dia;
    }
}
