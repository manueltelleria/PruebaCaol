<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!-- saved from url=(0043)http://www.agence.com.br/caol/consultas.php -->
<HTML><HEAD><TITLE>CAOL - Controle de Atividades Online - Agence Interativa</TITLE>
<script src="{{ url('js/jquery-2.2.0.min.js') }}"></script>
<style>
	#sub1, #sub2, #sub3
	{ position: absolute;
	  left: 480px;
	  visibility: hidden;
	  z-index: 3
	}
</style>
		<script language='javascript' src="js/popcalendar.js"></script>
<SCRIPT language="JavaScript">
<!--
<!-- comeco do selection box
function move(fbox, tbox) {
var arrFbox = new Array();
var arrTbox = new Array();
var arrLookup = new Array();
var i;
for (i = 0; i < tbox.options.length; i++) {
arrLookup[tbox.options[i].text] = tbox.options[i].value;
arrTbox[i] = tbox.options[i].text;
}
var fLength = 0;
var tLength = arrTbox.length;
var $lista = document.getElementById('lista_analista');
var $lista_val = ($lista.value != null) ? $lista.value : '';
for(i = 0; i < fbox.options.length; i++) {
arrLookup[fbox.options[i].text] = fbox.options[i].value;
if (fbox.options[i].selected && fbox.options[i].value != "") {
arrTbox[tLength] = fbox.options[i].text;
arrTbox[tLength].value = fbox.options[i].value;
$lista_val = $lista_val+" ,"+fbox.options[i].text;
tLength++;
}
else {
arrFbox[fLength] = fbox.options[i].text;
fLength++;
   }
}

document.getElementById('lista_analista').value = $lista_val;
arrFbox.sort();
arrTbox.sort();
fbox.length = 0;
tbox.length = 0;
var c;
for(c = 0; c < arrFbox.length; c++) {

var no = new Option();
no.value = arrLookup[arrFbox[c]];
no.text = arrFbox[c];
fbox[c] = no;
}
for(c = 0; c < arrTbox.length; c++) {
var no = new Option();
no.value = arrLookup[arrTbox[c]];
no.text = arrTbox[c];
tbox[c] = no;
   }
}
//  fim de selection box -->

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<SCRIPT LANGUAGE="JavaScript">

<!-- selecione e mostra o campo
catnumber = 1
offset = 150
performOnchange = false
if (document.all) {
  docObj = "document.all."
  styleObj = ".style"
  } else {
  docObj = "document."
  styleObj = ""
}
function openselect(subcat) {
  popupselect = eval(docObj + subcat + styleObj)
  popupselect.visibility = "visible"
}
function closeselect(submenu,subcat){
  popupselect = eval(docObj + subcat + styleObj)
  if (submenu.selectedIndex != 0) {
    popupselect.visibility = "hidden"
    numchoice = submenu.selectedIndex
    choice = submenu[numchoice].value
    subcategory.value = choice
    submenu.selectedIndex = 0
  }
}
function lock() {
  performOnchange = false
}
function unlock() {
  performOnchange = true
}
function selectSub(cat) {
  for (i=1; i <= catnumber; i++) {
    subcat = "sub" + i
    popupselect = eval(docObj + subcat + styleObj)
    popupselect.visibility = "hidden"
  }
  if (performOnchange == true) {
    letsopen = "sub" + cat.selectedIndex
    if (letsopen == "sub0") {
      alert("No category selected")
      choice = "Cancelada"
      subcategory.value = choice
      cat.focus()
      } else {
      openselect(letsopen)
      lock()
    }
  }
}
//  fim do seleciona e mostra campo -->
</script>
<SCRIPT language=JavaScript src="js/cor_fundo.js" type=text/javascript></SCRIPT>
<script language="JavaScript">
<!--
function PesquisaAvancada()
	{
		if (document.all['pesquisaAvancada'][1].style.display=='none')
			{
			document.all['pesquisaAvancada'][1].style.display='block'
			
			;
			}
		else
			{
			document.all['pesquisaAvancada'][1].style.display='none'
		
			;
			}
	}//-- fim PesquisaAvancada
//-->

//  fim de formatacao de valores financeiros -->
</script>
<SCRIPT language=JavaScript>
<!-- Begin
datetoday = new Date();
timenow=datetoday.getTime();
datetoday.setTime(timenow);
thehour = datetoday.getHours();
if (thehour > 18) display = "Boa noite";
else if (thehour >12) display = "Boa tarde";
else display = "Bom dia";
var greeting = (display + " ");

//  End -->
</script>
<SCRIPT language=JavaScript>
<!--

//-->
</SCRIPT>
<!-- HTML HEADER -->
<META http-equiv=Content-Type content="text/html; charset=windows-1252">
<META content="NOINDEX, NOFOLLOW" name=ROBOTS>
<META http-equiv=Content-Language content=pt-br>
<META http-equiv=pragma content=no-cache>
<META http-equiv=cache-Control content="no cache">
<META http-equiv=expires content="sat, 04 dec 1993 21:29:02 gmt">
<META http-equiv=Refresh content="600; url=main.php">
<link href="{{ url('css/style.css') }}" type="text/css" rel="stylesheet" />


<SCRIPT language=JavaScript src="{{ url('js/menu_array.js.htm') }}" type=text/javascript></SCRIPT>

<SCRIPT language=JavaScript src="{{ url('js/menu_script.js') }}" type=text/javascript></SCRIPT>

<META content="MSHTML 6.00.2800.1106" name=GENERATOR>
</HEAD>
<BODY>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
    <TD width="100%" colSpan=3 height=10><IMG  src="{{ url('images/spacer.gif') }}"  width=10></TD></TR>
  <TR>
    <TD noWrap width=10><IMG src="{{ url('images/spacer.gif') }}"  width=10></TD>
    <TD width="100%">
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD style="BORDER-BOTTOM: #ccc 1px solid">&nbsp;</TD>
          <TD width=98 background="" height=40 rowSpan=2><A 
            href="http://www.agence.com.br/" target=_blank><IMG alt="" src="{{ url('images/logo.gif') }}"  border=0></A></TD></TR>
        <TR>
          <TD 
          style="PADDING-RIGHT: 3px; PADDING-LEFT: 3px; PADDING-BOTTOM: 3px; BORDER-LEFT: #ccc 1px dotted; PADDING-TOP: 3px"><IMG 
            height=15 alt="" src="{{ url('images/fig.gif') }}"  width=51 border=0></TD></TR></TBODY></TABLE></TD>
    <TD noWrap width=10><IMG src="{{ url('images/spacer.gif') }}" width=10></TD></TR>
  <TR>
    <TD width="100%" colSpan=3 height=10><IMG src="{{ url('images/spacer.gif') }}" width=10></TD></TR>
  <TR>
    <TD noWrap width=10><IMG src="{{ url('images/spacer.gif') }}" width=10></TD>
    <TD width="100%">&nbsp;</TD>
    <TD noWrap width=10><IMG  src="{{ url('images/spacer.gif') }}" width=10></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
    <TD noWrap width=10><IMG  src="{{ url('images/spacer.gif') }}" width=10></TD>
    <TD width="100%">
      <table cellspacing=0 cellpadding=0 width="100%" border=0>
        <tr>
          <td class=index style="PADDING-RIGHT: 10px; PADDING-LEFT: 10px; PADDING-BOTTOM: 10px; PADDING-TOP: 10px" valign=top><table border="0" width="100%" cellspacing="0" cellpadding="0">
                <tr>
                  <td nowrap valign="bottom" align="center" class="cel_tab" height="35"><input type="submit" value name="nothing2" class="nothing">
&nbsp;&nbsp;</td><form action="con_desempenho.htm">
                  <td nowrap valign="bottom" align="center"><span class="cel_tab">
                    <input type="submit" value="Por Consultor" name="act22223" class="tab_current">
                  </span></td>
				  </form>
                  <td nowrap valign="bottom" align="center" class="cel_tab">&nbsp;&nbsp;</td>
				  <form action="con_desempenho_aba_cliente.htm">
                  <td nowrap valign="bottom" align="center"><input type="submit" value="Por Cliente" name="act2" class="tab">                  </td>
				  </form>
                  <td nowrap valign="bottom" align="center" class="cel_tab">&nbsp;&nbsp;</td>
				  <form action="cadastro_boleto_carregado_cancelado.htm">
                  <td nowrap valign="bottom" align="center" class="cel_tab">&nbsp;</td>
				  </form>
                  <td nowrap valign="bottom" align="center" class="cel_tab">&nbsp;&nbsp;</td>
                  <td nowrap valign="bottom" align="center" class="cel_tab">&nbsp;</td>
                  <td nowrap valign="bottom" align="center" class="cel_tab">&nbsp;&nbsp;</td>
                  <td nowrap valign="bottom" align="center" class="cel_tab">&nbsp;</td>
                  <td nowrap valign="bottom" align="center" class="cel_tab">&nbsp;&nbsp;</td>
                  <td nowrap valign="bottom" align="center" class="cel_tab">&nbsp;</td>
                  <td valign="bottom" class="cel_tab" width="100%">&nbsp;</td>
                </tr>
              </table>
              <br>
              <form id="entrada" name="entrada" action="{{ url('consultor') }}">
              <table width="100%" cellpadding="3" cellspacing="1"  bgcolor="#cccccc"  id="pesquisaAvancada">
                <tbody>
                  <tr bgcolor="#fafafa">
                    <td width="10%" nowrap="nowrap" bgcolor="#efefef"><div align="right"><strong>Per&iacute;odo</strong></div></td>
                    <td><font color="black">
                      <select name="mes_in">
                        @for	($i	=	0;	$i	<	12;	$i++)
                          <option value={{ $i }}>{{ $meses[$i] }}</option>
                        @endfor
                      </select>
                      <select name="anho_in">
                        @foreach	($anhos as $anho)
                          <option value={{ $anho }}>{{ $anho }}</option>
                        @endforeach
                      </select>
                      a
                      <select name="mes_fn">
                        @for	($i	=	0;	$i	<	12;	$i++)
                          <option value={{ $i }}>{{ $meses[$i] }}</option>
                        @endfor
                      </select>
                      <select name="anho_fn">
                        @foreach	($anhos as $anho)
                          <option value={{ $anho }}>{{ $anho }}</option>
                        @endforeach
                      </select>
                    </font></td>
                    <td width="20%" rowspan="2"><div align="center"><font color="black">
                        <div id="relatorio"><input style="BORDER-RIGHT: 1px outset; BORDER-TOP: 1px outset; FONT-SIZE: 8pt; BACKGROUND-POSITION-Y: center; LEFT: 120px; BACKGROUND-IMAGE: url(img/icone_relatorio.png); BORDER-LEFT: 1px outset; WIDTH: 110px; BORDER-BOTTOM: 1px outset; BACKGROUND-REPEAT: no-repeat; FONT-FAMILY: Tahoma, Verdana, Arial; HEIGHT: 22px; BACKGROUND-COLOR: #CCCCCC" type="submit" value="Relat&oacute;rio" name="btSalvar22" /></div>
                       <div id="pizza"> <input style="BORDER-RIGHT: 1px outset; BORDER-TOP: 1px outset; FONT-SIZE: 8pt; BACKGROUND-POSITION-Y: center; LEFT: 120px; BACKGROUND-IMAGE: url(img/icone_grafico.png); BORDER-LEFT: 1px outset; WIDTH: 110px; BORDER-BOTTOM: 1px outset; BACKGROUND-REPEAT: no-repeat; FONT-FAMILY: Tahoma, Verdana, Arial; HEIGHT: 22px; BACKGROUND-COLOR: #CCCCCC" type="submit"  value="Pizza" name="btSalvar222" /></div>
                       <div id="grafico"><input style="BORDER-RIGHT: 1px outset; BORDER-TOP: 1px outset; FONT-SIZE: 8pt; BACKGROUND-POSITION-Y: center; LEFT: 120px; BACKGROUND-IMAGE: url(img/icone_pizza.png); BORDER-LEFT: 1px outset; WIDTH: 110px; BORDER-BOTTOM: 1px outset; BACKGROUND-REPEAT: no-repeat; FONT-FAMILY: Tahoma, Verdana, Arial; HEIGHT: 22px; BACKGROUND-COLOR: #CCCCCC" type="submit" value="Gráfico" name="btSalvar222" /></div>
                    </font></div></td>
                  </tr>
                  <tr bgcolor="#fafafa">
                    <td nowrap="nowrap" bgcolor="#efefef"><div align="right"><strong>Consultores</strong></div></td>
                    <td><table align="center">
                        <tr>
                          <td>
                            <select multiple size="8" name="list1" id="list1" style="width:280">
                              @foreach ($consultores as $consultor)
                                <option value="{{ $consultor->co_usuario }}">{{$consultor->no_usuario}}</option>
                              @endforeach
                            </select>
                          </td>
                          <td align="center" valign="middle"><input name="button" type="button" onClick="move(list1,list2)" value=">>">
                              <br>
                              <input name="button" type="button" onClick="move(list2,list1)" value="<<">
                          </td>
                          <td><select multiple size="8" name="list2" id="list2" style="width:280">
                            </select>
                            <input type="hidden"  id="lista_analista" name="lista_analista" value="">
                          </td>
                        </tr>
                    </table></td>
                  </tr>
                </tbody>
              </table>
              </form>
              <p>
           </form>
            </p>
        </tr>
      </table>
    </TD>
    <TD noWrap width=10>
      <IMG src="{{ url ('images/spacer.gif') }}"  width=10>
      </TD>
    </TR>
  </TBODY>
 </TABLE>


