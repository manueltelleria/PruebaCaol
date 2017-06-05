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
		//$this->middleware('auth');
	}

	public function pp()	{
        
        $consultores = $this->getconsultores();
		$anhos = array('2003','2004','2005','2006','2007');

		return	view('consultor.entrada',	array('consultores'	=> $consultores,
		                                          'meses'       => $this->meses,
												  'anhos'       => $anhos));
	}

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

        //$data['parametros']=$this->input->post();
       // $data['dump']=$this->input->post();

        return view('consultor.relatorio')->with($data);
    }



     public function pizza() {
        
        $consultores_in= explode(',', $this->input->post('contultores_sel'));
        $f1=$this->input->post('anho_desde').'-'.$this->input->post('mes_desde');
        $f2=$this->input->post('anho_hasta').'-'.$this->input->post('mes_hasta');
        $titulo = "desde ".$meses[$this->input->post('mes_desde')-1]. " de ". $this->input->post('anho_desde'). " a ". $meses[$this->input->post('mes_hasta')-1]. " de ". $this->input->post('anho_hasta');

        $desempenho=null;
        $ganancia=[];
        foreach ($consultores_in as  $consultor) {
            $desempenho = $this->desempenho->getDesempenhoConsultor($consultor, $f1, $f2 );
            $total=null;
            $total['receita']=0;

            if ($desempenho){
                foreach ($desempenho->result() as $value) {
                    $total['receita']= $total['receita']+ $value->receita;
                }
                array_push($ganancia, array($consultor, $total['receita']));
            }
        }

        $this->load->view('/commons/head');
        $this->load->view('/commons/nav');
        $this->load->view('/commons/header');

        $consultores = $this->usuario->getConsultores();
        $data['consultores'] = $consultores;
        $data['pizza'] = $ganancia;
        $data['titulo'] = $titulo;
        $data['meses']=$meses;
        $data['parametros']=$this->input->post();
        $data['dump']=$this->input->post();
        $this->load->view('/comercial/performance', $data);

        $this->load->view('/commons/footer');
        $this->load->view('/commons/scripts');
        $this->load->view('/comercial/pizza');
        $this->load->view('/commons/close');

    }

    public function grafico()
    {
        if(!$this->session->userdata('log_in')){
            header("Location: ".base_url()."logout");
        }
        $meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' );
        $consultores_in= explode(',', $this->input->post('contultores_sel'));
        $f1=$this->input->post('anho_desde').'-'.$this->input->post('mes_desde');
        $f2=$this->input->post('anho_hasta').'-'.$this->input->post('mes_hasta');
        $titulo = "desde ".$meses[$this->input->post('mes_desde')-1]. " de ". $this->input->post('anho_desde'). " a ". $meses[$this->input->post('mes_hasta')-1]. " de ". $this->input->post('anho_hasta');
        $desempenho=null;
        $ganancia=null;
        $periodos = null;
        $costos = 0;
        foreach ($consultores_in as  $consultor) {

            $ganancia[$consultor] =[];

            $desempenho = $this->desempenho->getDesempenhoConsultor($consultor, $f1, $f2 );
            $costo = $this->desempenho->getCostofijoConsultor($consultor);
            if ($costo){
                $costos = $costos + $costo->salario;
            }

            if ($desempenho){
                foreach ($desempenho->result() as $value) {
                    $ganancia[$consultor][$meses[$value->mes-1].' de '. $value->anho] = $value->receita;
                    $periodos[$meses[$value->mes-1].' de '. $value->anho]=1;
                }
            }
        }

        $costos = $costos / count($consultores_in);

        $this->load->view('/commons/head');
        $this->load->view('/commons/nav');
        $this->load->view('/commons/header');

        $consultores = $this->usuario->getConsultores();
        $data['consultores'] = $consultores;
        $data['grafico'] = $ganancia;
        $data['titulo'] = $titulo;
        $data['periodos']=$periodos;
        $data['costos']=$costos;
        $data['meses']=$meses;
        $data['parametros']=$this->input->post();
        $data['dump']=$this->input->post();
        $this->load->view('/comercial/performance', $data);

        $this->load->view('/commons/footer');
        $this->load->view('/commons/scripts');
        $this->load->view('/comercial/grafico');
        $this->load->view('/commons/close');

    }


    
}