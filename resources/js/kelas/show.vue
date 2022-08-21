<template>
<div class="container">
<div class="row">
    <div class="col-sm-12">
  <div class="card" style="width: 18rem;">
 <img :src="'/img/kelas/' +  kelas.image " height="200px" width="50px" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{ kelas.nama }}</h5>
    <p class="card-text">{{ kelas.harga }}</p>
    <router-link to="/tablekelas" class="btn btn-primary">Kembali</router-link>
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