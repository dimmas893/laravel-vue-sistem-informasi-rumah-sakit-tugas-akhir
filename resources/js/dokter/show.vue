<template>
<div class="container">
<div class="row">
    <div class="col-sm-12">
  <div class="card" style="width: 18rem;">
 <img :src="'/img/dokter/' +  dokter.image " height="200px" width="50px" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{ dokter.nama }}</h5>
    <p class="card-text">{{ dokter.specialis }}</p>
    <p class="card-text">{{ dokter.jam }}</p>
    <router-link to="/tabledokter" class="btn btn-primary">Kembali</router-link>
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