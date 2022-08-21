<template>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"> <img :src="'/img/kelas/' +  kelas.image " height="100%" width="100%" class="card-img-top" alt="..."></h5>
      </div>
      <div class="modal-body">
        <h1 align="center">{{ kelas.nama }}</h1>
        <h2 align="center">{{ kelas.harga }}</h2>
      </div>
      <div class="modal-footer">
         <router-link to="/tablekelashome" data-dismiss="modal" class="btn btn-primary">Kembali</router-link>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
       data() {
        return{
            kelas: [],
        }
    },

    mounted () {
        this.getkelas();
    },

    
    
    
    
    
    methods: {
            async getkelas() {
                let response = await axios.get('/api/kelas/' + this.$route.params.kelas);
                this.kelas = response.data.data
            }
        },

}
</script>