<template>
<div class="container-header">
  

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Form Daftar Dokter &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <router-link to="tabledokter" type="submit" class="badge badge-primary">Kembali</router-link></div>
                    <div class="card-body">
                          <div>
                   
                          </div>
                        <form action="#" method="post"  enctype="multipart/form-data"  @submit.prevent="store">
                            <div class="form-group">
                                    <label for="nama">nama</label>
                                    <input type="text" v-model="form.nama" id="nama" class="form-control">
                                    <div v-if="theErrors.nama" class="mt-2 text-danger">{{ theErrors.nama[0] }}</div>
                             </div>

                                   <div class="form-group">
                                        <label for="specialis">specialis</label>
                                    <input type="text" v-model="form.specialis" id="specialis" class="form-control">
                                    <div v-if="theErrors.specialis" class="mt-2 text-danger">{{ theErrors.specialis[0] }}</div>
                                    </div>

                            <div class="form-group">
                                    <label for="jam">jam</label>
                                    <input type="text" v-model="form.jam" id="jam" class="form-control">
                                    <div v-if="theErrors.jam" class="mt-2 text-danger">{{ theErrors.jam[0] }}</div>
                            </div>

                            

                         <div class="form-group">
                            <label for="image">image</label>
                            <input type="file" class="form-control" @change="imageChange">
                             <div v-if="theErrors.image" class="mt-2 text-danger">{{ theErrors.image[0] }}</div>
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
            form: {
                nama: "",
                specialis: "",
                jam: "",
                image: "",
            },
            loading: false,
            theErrors: [],
        };
    },


    mounted() {
    },


    methods: {

         imageChange(e) {
            console.log(e.target.files[0])
            var fileReader = new FileReader()
            fileReader.readAsDataURL(e.target.files[0])
            fileReader.onload = (e) => {
              this.form.image = e.target.result
            }
            console.log(this.form)
          },
          


        async store() {
            this.loading = true;
         try {
            let response = await axios.post("/api/dokter/createdokter", this.form)
            if (response.status == 200) {
                this.form.nama = ""
                this.form.specialis = ""
                this.form.jam = ""
                this.form.image = ""
                this.theErrors = []
                this.loading = false;

             this.$toasted.show('Data berhasil ditambahkan', {
             type: 'success',
             duration: 3000,

           })
           this.$router.push('/tabledokter')
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