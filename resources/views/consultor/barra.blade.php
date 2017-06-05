@include('partials.entrada')
 <div id="stock-div"></div>
 {!! \Lava::render('ColumnChart', 'Finances', 'stock-div') !!}