 @include('partials.entrada')
 <div id="stock-div"></div>
 {!! \Lava::render('PieChart', 'IMDB', 'stock-div') !!}
 @include('partials.footer')
