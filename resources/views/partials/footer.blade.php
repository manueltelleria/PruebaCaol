
  <!-- Footer -->
        <footer class="footer-MaterialDark">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Prototipo</h5>
                        <p class="grey-text text-lighten-4">
                            Prueba Caol.<br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="NavLateralDivider"></div>
            <div class="footer-copyright">
                <div class="container center-align">
                    &#174; 2017 AGENCE 
                </div>
            </div>
        </footer>

         <script>
		   $(document).ready(function(){
		     $('#pizza').click(function(){
                $('#entrada').attr('action', '{{ url('pizza') }}');
             });
             $('#relatorio').click(function(){
                $('#entrada').attr('action', '{{ url('relatorio') }}');
             });
             $('#grafico').click(function(){
                $('#entrada').attr('action', '{{ url('grafico') }}');
             })
		   });
	
	</script>
 </BODY></HTML>