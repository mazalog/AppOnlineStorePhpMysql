



<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<script src="js/intro.js"></script>

</section>

</main>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 10000000;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <p class="text-justify des"></p>



                    </div>
                    <div class="modal-footer p-1">

                        <button type="button" class=" btn color-busqueda text-white" data-dismiss="modal">Cerrar</button>

                    </div>
                </div>
            </div>
        </div>

<footer class="color-busqueda fixed-bottom  barrade" id="barrade">
    <div class="d-none d-sm-none d-md-block" style="font-size:15px;">
        <div class="row">
            <div class="col-md-1 col-lg-1"></div>
            <div class="col-sm-3 col-lg-3 p-1 text-white">
                <p class="text-left"><b>Soluciones Integrales ASRI</b>  
                <a href="https://www.instagram.com/solucionesintegralesasric.a/" class="" style="color: white;">   
            <img src="estilo/img/Logo-instagram.png" class="ml-2" width="8%"> 
            </a> 
            <a href="https://www.facebook.com/Soluciones-Integrales-ASRI-CA-111862444006596/" class="" style="color: white;">   
            <img src="estilo/img/Logo-Facebook.png" class="ml-2" width="8%"> 
            </a> 
            <a href="https://twitter.com/AsriIntegrales" class="" style="color: white;">   
            <img src="estilo/img/Logo-Twitter.png" class="ml-2" width="8%"> 
            </a>
           

        
        </p>
                <p class="text-left"><b>RIF J-41293736-7</b></p>
            </div>

            <div class="col-md-6 col-lg-6 p-2 text-white">
                <p> <b>Urb. La Carlota Avda. "B", entre la Avda. Ppal. y Av. "A" Edf. Central Piso PB, Local 4 </b> 

                <p class=" text-black"><b>Telefonos de contacto: 0212-237-53.08/0212-234.11.90 
                Correo: solucionesasri@gmail.com</b> </p>
          

                </p>
                
            </div>

            <div class="col-md-2 col-lg-2">


            </div>

        </div>
    </div>

</footer>









<script>
    window.onload = function() {
      var contenedor = document.getElementById('contenedor_carga');
      contenedor.style.visibility = 'hidden';
      contenedor.style.opacity = '0';


    }
  </script>



<script>
    // For the thumbnail demo! :]

    var count = 10
    setTimeout(demo, 500)
    setTimeout(demo, 700)
    setTimeout(demo, 900)
    setTimeout(reset, 2000)

    setTimeout(demo, 2500)
    setTimeout(demo, 2750)
    setTimeout(demo, 3050)


    var mousein = false

    function demo() {
        if (mousein) return
        document.getElementById('demo' + count++)
            .classList.toggle('hover')

    }

    function demo2() {
        if (mousein) return
        document.getElementById('demo2')
            .classList.toggle('hover')
    }

    function reset() {
        count = 1
        var hovers = document.querySelectorAll('.hover')
        for (var i = 0; i < hovers.length; i++) {
            hovers[i].classList.remove('hover')
        }
    }

    document.addEventListener('mouseover', function() {
        mousein = true
        reset()
    })
</script>






</body>

</html>