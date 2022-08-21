<template>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"> <img :src="'/img/obat/' +  obat.image " height="100%" width="100%" class="card-img-top" alt="..."></h5>
      </div>
      <div class="modal-body">
        <h1 align="center">{{ obat.nama }}</h1>
        <h2 align="center">{{ obat.harga }}</h2>
      </div>
      <div class="modal-footer">
         <router-link to="/tableobathome" data-dismiss="modal" class="btn btn-primary">Kembali</router-link>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
       data() {
        return{
            obat: [],
        }
    },

    mounted () {
        this.getobat();
    },

    
    
    
    
    
    methods: {
            async getobat() {
                let response = await axios.get('/api/obat/' + this.$route.params.obat);
                this.obat = response.data.data
            }
        },

}
</script>