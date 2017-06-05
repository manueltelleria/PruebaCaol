<?php namespace App\Http\Controllers\Consultor;


use Khill\Lavacharts\Lavacharts;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Consultor\ListadoController;
use App\CaoUsuario;
use App\CaoSalario;
use App\CaoFatura;
use	Illuminate\Http\Request;
use App\TraitConsultores;


/*
* Controlador que muestra los gráficos 
*/
class GraphsController extends Controller {

    //Se utilizan Traits para la reutilización de código

    use TraitConsultores;
    private $meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' );
    private	$anhos = array('2003','2004','2005','2006','2007');

    /* Pizza
    * muestra el gráfico de torta, utilizando la librería de Laravel Lavacharts  o Lava
    */
    public function  pizza(Request $request) {

        $consultores = explode(',', $request->input('lista_analista'));
        $mes_in = $request->input('mes_in') + 1;
        $mes_fn = $request->input('mes_fn') + 1;
        $fecha_in = $request->input('anho_in').'-'.$mes_in.'-01';
        $fecha_fn = $request->input('anho_fn').'-'.$mes_fn.'-'.$this->getDia($request->input('mes_fn')+1);
        $titulo = "Ganancias desde ".$this->meses[$mes_in]." de ".$request->input('anho_in')." a ".$this->meses[$mes_fn]." de ".$request->input('anho_fn');
        
        $ganancias = [];
        $total = [];
        foreach ($consultores as  $consultor) {
            if ($consultor != null){
                                
                $con = CaoUsuario::where('no_usuario', $consultor)->first();
                
                $desempeno = $this->getDesempeno($con['co_usuario'], $fecha_in, $fecha_fn );

                $total_cons = 0 ;           
                if ($desempeno){
                    foreach ($desempeno as $value) {
                        $total_cons += $value['receita'];
                    }
                    array_push($ganancias, array($consultor, $total_cons));
                    $total_cons = 0;
                }
            }
        }

        $consultores = $this->getConsultores();

        $reasons = \Lava::DataTable();

        $reasons->addStringColumn('Reasons')
                ->addNumberColumn('Percent');

       foreach ($ganancias as $ganancia){
          $reasons->addRow([$ganancia[0], $ganancia[1]]);
       }
          
     \Lava::PieChart('IMDB', $reasons, [ 'title'  => $titulo,
                                         'is3D'   => true,
                                         'slices' => [
                                                       ['offset' => 0.2],
                                                       ['offset' => 0.25],
                                                       ['offset' => 0.3]  
                                                    ]
                                      ]);
       $data['meses'] = $this->meses; 
        $data['consultores'] = $this->getConsultores();
        $data['ganancia'] = '';
        $data['titulo'] = '';
        $data['meses'] = $this->meses;
        $data['anhos'] = $this->anhos;                                     
       return view('consultor.pizza')->with($data);
    }

   /* grafico
    * muestra el gráfico de barras, utilizando la librería HighCharts
    */
    public function grafico(Request $request) {
        
        $consultores = explode(',', $request->input('lista_analista'));
        $mes_in = $request->input('mes_in') + 1;
        $mes_fn = $request->input('mes_fn') + 1;
        $fecha_in = $request->input('anho_in').'-'.$mes_in.'-01';
        $fecha_fn = $request->input('anho_fn').'-'.$mes_fn.'-'.$this->getDia($request->input('mes_fn')+1);
        $titulo = "desde ".$this->meses[$mes_in]." de ".$request->input('anho_in')." a ".$mes_fn." de ".$request->input('anho_fn');
        $desempenho=null;
        $ganancia=null;
        $periodos = null;
        $costos = 0;
        $consultores_nom = [];
        foreach ($consultores as  $consultor) {
            if ($consultor != null){

                $con = CaoUsuario::where('no_usuario', $consultor)->first();

                array_push($consultores_nom, $con['co_usuario'] );
                $ganancia[$con['co_usuario']] = [];

                $desempeno = $this->getDesempeno($con['co_usuario'], $fecha_in, $fecha_fn );
                $costo = $this->getCostofijo($con['co_usuario']);
                if ($costo){
                    $costos = $costos + $costo->salario;
                }

                if ($desempeno){
                    foreach ($desempeno as $value) {
                        $ganancia[$con['co_usuario']][$this->meses[$value->mes-1].' de '. $value->anho] = $value->receita;
                        $periodos[$this->meses[$value->mes-1].' de '. $value->anho]=1;
                    }
                }
            }        
        }

        $costos = $costos / count($consultores); 

        $consultores = $this->getConsultores();
        $data['consultores'] = $consultores;
        $data['grafico'] = $ganancia;
        $data['titulo'] = $titulo;
        $data['periodos']=$periodos;
        $data['costos']=$costos;
        $data['meses']=$this->meses; 
        $data['anhos'] = $this->anhos;                                     

        $consultores = $this->getConsultores();
        $data['consultores'] = $consultores;
        $data['grafico'] = $ganancia;
        $data['titulo'] = $titulo;
        $data['periodos']=$periodos;
        $data['costos']=$costos;
        $data['meses']=$this->meses;
        
        return view('consultor.grafico')->with($data);

    }

}