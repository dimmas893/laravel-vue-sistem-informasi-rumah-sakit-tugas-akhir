<template>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"> <img :src="'/img/dokter/' +  dokter.image " height="100%" width="100%" class="card-img-top" alt="..."></h5>
      </div>
      <div class="modal-body">
        <h1 align="center">{{ dokter.nama }}</h1>
        <h2 align="center">{{ dokter.specialis }}</h2>
        <h2 align="center">{{ dokter.jam }}</h2>
      </div>
      <div class="modal-footer">
         <router-link to="/tabledokterhome" data-dismiss="modal" class="btn btn-primary">Kembali</router-link>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
       data() {
        return{
            dokter: [],
        }
    },

    mounted () {
        this.getdokter();
    },

    
    
    
    
    
    methods: {
            async getdokter() {
                let response = await axios.get('/api/dokter/' + this.$route.params.dokter);
                this.dokter = response.data.data
            }
        },

}
</script>