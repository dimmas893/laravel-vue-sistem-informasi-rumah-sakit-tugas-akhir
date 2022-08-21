<template>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"> <img :src="'/img/pasien/' +  pasien.image " height="100%" width="100%" class="card-img-top" alt="..."></h5>
      </div>
      <div class="modal-body">
        <h5 align="center">PASIEN BERNAMA :</h5>
        <h1 align="center">{{ pasien.nama }}</h1>
        <h2 align="center">{{ pasien.alamat }}</h2>
        <h2 align="center">{{ pasien.ttl }}</h2>
        <h2 align="center">{{ pasien.keluhan }}</h2>
        <h2 align="center">{{ pasien.nomor }}</h2>
        <h5 align="center">DIPERIKSA OLEH :</h5>
        <h2 align="center"> <img :src="'/img/dokter/' +  pasien.dokter_image " height="100%" width="100%" class="card-img-top" alt="..."></h2>
        <h2 align="center">{{ pasien.dokter_nama }}</h2>
        <h2 align="center">{{ pasien.dokter_specialis }}</h2>
        <h2 align="center">{{ pasien.dokter_jam}}</h2>
        <h5 align="center">DIRAWAT DI KELAS :</h5>
        <h2 align="center"> <img :src="'/img/kelas/' +  pasien.kelasimage " height="100%" width="100%" class="card-img-top" alt="..."></h2>
        <h2 align="center">{{ pasien.kelasnama}}</h2>
        <h2 align="center">{{ pasien.kelasharga}}</h2>
        <h5 align="center">OBAT :</h5>
        <h2 align="center"> <img :src="'/img/obat/' +  pasien.obatimage " height="100%" width="100%" class="card-img-top" alt="..."></h2>
        <h2 align="center">{{ pasien.obatnama}}</h2>
        <h2 align="center">{{ pasien.obatharga}}</h2>
      </div>
      <div class="modal-footer">
         <router-link to="/tabelpasien" data-dismiss="modal" class="btn btn-primary">Kembali</router-link>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
       data() {
        return{
            pasien: [],
        }
    },

    mounted () {
        this.getpasien();
    },

    
    
    
    
    
    methods: {
            async getpasien() {
                let { data } = await axios.get('/api/pasien/' + this.$route.params.pasien)
                this.pasien = data.data
            },
        },

}
</script>