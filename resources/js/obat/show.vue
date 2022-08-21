<template>
<div class="container">
<div class="row">
    <div class="col-sm-12">
  <div class="card" style="width: 18rem;">
 <img :src="'/img/obat/' +  obat.image " height="200px" width="50px" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{ obat.nama }}</h5>
    <p class="card-text">{{ obat.harga }}</p>
    <router-link to="/tableobat" class="btn btn-primary">Kembali</router-link>
  </div>
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