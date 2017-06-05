 @if(@ganancia)
   @foreach ($ganancia as $key => $value) 
      <table cellspacing=1 cellpadding=3 width="100%" bgcolor=#cccccc  id="pesquisaAvancada">
        <tbody>
          <tr bgcolor=#efefef>
            <td colspan=5><span class="style3">{{ $key }} <br> {{ $titulo }} </span></td>
          </tr>
          <tr bgcolor=#fafafa>
            <td nowrap><div align="center"><strong>Periodo</strong></div></td>
            <td><div align="center"><strong>Ganancia Líquida</strong></div></td>
            <td><div align="center"><strong>Costo fijo</strong></div></td>
            <td><div align="center"><strong>Comisión</strong></div></td>
            <td><div align="center"><strong>Lucro</strong></div></td>
          </tr>
          @foreach ($value as $value2) 
            <tr bgcolor=#fafafa>
               <{{$value2['fila']}}><div align="right">{{ $value2['periodo'] }}</div></{{$value2['fila']}}>
               <{{$value2['fila']}}><div align="right"><font color="{{$value2['color']}}">R$ {{ number_format($value2['receita']) }}</font></div></{{ $value2['fila']}}>
               <{{$value2['fila']}}><div align="right"><font color="red">R$ -{{ number_format($value2['costo']) }}</font></div></{{$value2['fila']}}>
               <{{$value2['fila']}}><div align="right"><font color="red">R$ -{{ number_format($value2['comissao']) }}</fornt></div></{{$value2['fila']}}>
               <{{$value2['fila']}}><div align="right"><font color="black">R$ {{ number_format($value2['receita'] - $value2['comissao'] - $value2['costo']) }}</font></div></{{$value2['fila']}}>
             </tr>
         @endforeach
      </table>
      <br><br>
  @endforeach
 @endif
