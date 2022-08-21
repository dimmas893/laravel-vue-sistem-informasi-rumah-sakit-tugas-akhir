<template>
<div class="container-header">
  

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Form Daftar Pasien &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <router-link to="/tabelpasien" type="submit" class="badge badge-primary">Kembali</router-link></div>
                    <div class="card-body">
                          <div>
                   
                          </div>
                        <form action="#" method="post"  enctype="multipart/form-data"  @submit.prevent="update">

                         <div class="form-group">
                                    <label for="nama">nama</label>
                                    <input type="text" v-model="form.nama" id="nama" class="form-control">
                                    <div v-if="theErrors.nama" class="mt-2 text-danger">{{ theErrors.nama[0] }}</div>
                             </div>

                              <div class="form-group">
                                    <label for="alamat">alamat</label>
                                    <input type="text" v-model="form.alamat" id="alamat" class="form-control">
                                    <div v-if="theErrors.alamat" class="mt-2 text-danger">{{ theErrors.alamat[0] }}</div>
                             </div>

                              <div class="form-group">
                                    <label for="keluhan">keluhan</label>
                                    <input type="text" v-model="form.keluhan" id="keluhan" class="form-control">
                                    <div v-if="theErrors.keluhan" class="mt-2 text-danger">{{ theErrors.keluhan[0] }}</div>
                             </div>

                              <div class="form-group">
                                    <label for="nomor">nomor</label>
                                    <input type="text" v-model="form.nomor" id="nomor" class="form-control">
                                    <div v-if="theErrors.nomor" class="mt-2 text-danger">{{ theErrors.nomor[0] }}</div>
                             </div>

                              <div class="form-group">
                                    <label for="ttl">ttl</label>
                                    <input type="text" v-model="form.ttl" id="ttl" class="form-control">
                                    <div v-if="theErrors.ttl" class="mt-2 text-danger">{{ theErrors.ttl[0] }}</div>
                             </div>

                       <div class="form-group">
                                <label for="dokter">dokter</label>
                                <select @change="selecteddokter" id="dokter" class="form-control">
                                    <option :value="form.dokterid" v-text="form.dokter"></option>
                                        <template v-for="dokter in dokters">
                                            <option v-if="form.dokterid !== dokter.id" :key="dokter.id" :value="dokter.id">
                                                {{ dokter.nama }}
                                            </option>
                                        </template>
                                </select>
                                  <div v-if="theErrors.dokter" class="mt-2 text-danger">{{ theErrors.dokter[0] }}</div>
                            </div>


                            <button type="submit" class="btn btn-primary d-flex align-items-center">save
                                
                                <template v-if="loading">
                                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; display: block; shape-rendering: auto;" width="20px" height="20px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                    <rect x="17.5" y="30" width="15" height="40" fill="#cedeed">
                                    <animate attributeName="y" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="18;30;30" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.2s"></animate>
                                    <animate attributeName="height" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="64;40;40" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.2s"></animate>
                                    </rect>
                                    <rect x="42.5" y="30" width="15" height="40" fill="#9fcef2">
                                    <animate attributeName="y" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="20.999999999999996;30;30" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.1s"></animate>
                                    <animate attributeName="height" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="58.00000000000001;40;40" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.1s"></animate>
                                    </rect>
                                    <rect x="67.5" y="30" width="15" height="40" fill="#81beeb">
                                    <animate attributeName="y" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="20.999999999999996;30;30" keySplines="0 0.5 0.5 1;0 0.5 0.5 1"></animate>
                                    <animate attributeName="height" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="58.00000000000001;40;40" keySplines="0 0.5 0.5 1;0 0.5 0.5 1"></animate>
                                    </rect></svg>
                                </template>
                            </button>
                        </form>
                    </div>
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
           form:[],
            loading: false,
            dokters:[], 
            theErrors: [],
            loading: false,
            selected:'',
        };
    },


    mounted() {
        this.getdokters();
        this.getpasien();
    },


    methods: {



             async getdokters() {
                 let response = await axios.get('/api/dokter/ambildokter')
                    if (response.status == 200) {
                        this.dokters = response.data
                 }
              },


            async getpasien() {
                 let response = await axios.get(`/api/pasien/${this.$route.params.pasien}`);
                    this.form = response.data.data
            },


              selecteddokter(e) {
                  this.selected = e.target.value
              },
        async update() {
            this.loading = true;
         try {
                  this.form['dokter'] = this.selected || this.form.dokterid
                   let response = await axios.patch(`/api/pasien/${this.$route.params.pasien}/edit`, this.form)
                    if (response.status == 200) {
                        this.form.nama = ""
                        this.form.alamat = ""
                        this.form.keluhan = ""
                        this.form.nomor = ""
                        this.form.ttl = ""
                        this.theErrors = []
                        this.loading = false;


                            this.$toasted.show('Data berhasil ditambahkan', {
                            type: 'success',
                            duration: 3000,

                        })
                    this.$router.push('/tabelpasien')
                }
             }catch (e) {

            this.loading = false;
             this.$toasted.show('Data gagal ditambahkan !!!', {
             type: 'error',
             duration: 3000,
         })

        this.theErrors = e.response.data.errors;
      }

    }
  }
};
</script>

<style>

</style>