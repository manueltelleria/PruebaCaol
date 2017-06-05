<?php namespace App\Http\Controllers\Consultor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\CaoUsuario;
use App\CaoSalario;
use App\CaoFatura;
use	Illuminate\Http\Request;
use App\TraitConsultores;


class ListadoController extends Controller {

    use TraitConsultores;

    private $meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' );
    private	$anhos = array('2003','2004','2005','2006','2007');

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');   //Se comenta ya que no se esta trabjando con login
	}

	public function entrada()	{
        
        $consultores = $this->getconsultores();

		return	view('consultor.entrada',	array('consultores'	=> $consultores,
		                                          'meses'       => $this->meses,
												  'anhos'       => $this->anhos));
	}

    /*
    * relatorio función donde muestra la tabla de ganancias por consultor en un perido de tiempo.
    * se utiliza el ORM eloquent para la busqueda de información en la base de datos
    */
	public function relatorio( Request $request)  {

        $consultores = explode(',', $request->input('lista_analista'));
        $mes_in = $request->input('mes_in') + 1;
        $mes_fn = $request->input('mes_fn') + 1;
        $fecha_in = $request->input('anho_in').'-'.$mes_in.'-01';
        $fecha_fn = $request->input('anho_fn').'-'.$mes_fn.'-'.$this->getDia($request->input('mes_fn')+1);
        $titulo = "desde ".$this->meses[$mes_in]." de ".$request->input('anho_in')." a ".$mes_fn." de ".$request->input('anho_fn');
        $desempenho=null;
        $ganancia=null; 
        foreach ($consultores as  $consultor) {
            if ($consultor != null){
                $ganancia[$consultor] =[];
                                
                $con = CaoUsuario::where('no_usuario', $consultor)->first();
                
                $desempeno = $this->getDesempeno($con['co_usuario'], $fecha_in, $fecha_fn );
                if ($desempeno){
                  $costo = $this->getCostofijo($con['co_usuario']);
                  $total=null;
                  $total['receita']=0;
                  $total['comissao']=0;
                  $total['costo']=0;
                  $total['periodo']='SALDO';
                  $total['fila'] = 'th';
                  $total['color'] = 'blue';

                
                    foreach ($desempeno as $value) {
                        array_push($ganancia[$consultor],  array('receita' => $value['receita'], 
                                                                 'comissao'=> $value['comissao'], 
                                                                 'periodo' => $value['mes'].$value['anho'], 
                                                                 'costo'   => $costo['salario'],
                                                                 'fila'    => 'td',
                                                                 'color'   => 'black' ));
                        $total['receita']  +=  $value['receita'];
                        $total['comissao'] +=  $value['comissao'];
                        $total['costo']    +=  $costo['salario'];
                    }
                }
                array_push($ganancia[$consultor], $total);
            }
        }

        $consultores = $this->getConsultores();
        $data['consultores'] = $consultores;
        $data['ganancia'] = $ganancia;
        $data['titulo'] = $titulo;
        $data['meses'] = $this->meses;
        $data['anhos'] = $this->anhos;

        return view('consultor.relatorio')->with($data);
    }
}