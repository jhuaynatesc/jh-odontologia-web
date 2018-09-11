<template>
  <div class="row">

      <div class="col-xl-3 col-lg-6">
            <!-- Card -->
            <div class="card-group">
              <div class="card card-block p-0">
                <div class="counter counter-md vertical-align bg-white h-350">
                  <div class="counter-icon p-20 green-600" style="position:absolute;top:0;left:0;">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="counter-icon p-20 font-size-30 green-600" style="position:absolute;top:0;right:0;">
                    <span class="counter-number">Pendiente</span>
                  </div>
                  <div class="counter-number-group font-size-30 vertical-align-middle">
                    
                    <div class="font-size-20 mt-3">Tiempo restante</div>
                    <span class="counter-icon green-600 mr-10"><i class="fas fa-clock"></i></span>
                    <span class="counter-number">9:00</span>
                    <div class="font-size-20 mt-3">Tipo de consulta: <span>Ninguna</span> </div>
                    <div class="font-size-20 mt-3">Doctor: <span>Ninguna</span> </div>
                  </div>

                  <div class="counter-icon p-20 font-size-18 green-600" style="position:absolute;bottom:0;left:0;">
                    <span class="counter-number">12/12/2018-12:00</span>
                  </div>
                  <div class="counter-icon p-20 font-size-18 green-600" style="position:absolute;bottom:0;right:0;">
                    <span class="counter-number">12/12/2018-12:00</span>
                  </div>
               </div>
            </div>
          </div>
            <!-- End Card -->
      </div>
  </div>
</template>
<script>
  
</script>
<script>
    import axios from 'axios';
    import toast from 'toastr';
    import moment from 'moment';
    export default {
        data (){
            return {

            }
        },
        computed:{
            isActived: function(){
               
            },
            //Calcula los elementos de la paginación
            pagesNumber: function() {
               
            }
        },
        methods : {
            listarRole (page,buscar,criterio){
                let me=this;
                var url= '/role?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayRole = respuesta.roles.data;
                    me.pagination= respuesta.pagination;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            cambiarPagina(page,buscar,criterio){
                
            }
        },
        mounted() {
        }
    }
</script>