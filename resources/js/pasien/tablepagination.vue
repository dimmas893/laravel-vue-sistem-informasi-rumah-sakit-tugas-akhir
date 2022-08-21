<template>
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data pasien</h4>
                 
                  <div class="card-header-action">
                  </div>
                <input type="text" v-model="search" placeholder="search">
                <router-link to="/createpasien" type="submit" class="btn btn-primary">tambah</router-link>
                 
                </div>  
                
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                      <thead>
                        <tr>
                          <th>no</th>
                          <th>foto</th>
                          <th>nama</th>
                          <th>keluhan</th>
                          <th>rekam</th>
                          <th>ttl</th>
                          <th>nomor</th>
                          <th>alamat</th>
                          <th>aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(pasien, index) in pasiens.data" :key="pasien.id">
                          
                            <td>{{ index+1 }}</td>
                             <td><img :src="'/img/pasien/' + pasien.image" height="100px" width="100px"></td>
                            <td>{{ pasien.nama }}</td>
                            <td>{{ pasien.keluhan }}</td>
                            <td>{{ pasien.rekam }}</td>
                            <td>{{ pasien.ttl }}</td>
                            <td>{{ pasien.nomor }}</td>
                            <td>{{ pasien.alamat }}</td>
                            <td>

                          
                                <router-link :to="{ name: 'showpasien', params: { pasien: pasien.nama } }"  type="submit" class="badge badge-info"><i class="fas fa-search"></i></router-link> ||
                                <router-link :to="{ name: 'editpasien', params: { pasien: pasien.nama } }" type="submit" class="badge badge-warning"><i class="fas fa-pen"></i></router-link> ||
                                  <delete-Note :endpoint="pasien.nama"/>
                           </td>
                      
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer">
                      <pagination :data="pasiens" @pagination-change-page="getResults"></pagination>
                  </div>
                </div>
              </div>
            </div>
</template>

<script>
import deleteNote from './Delete'
export default {

 components:{
     deleteNote
  },

 



    data() {
        return {
            pasiens:{},
            search:'',
        }
    },

 

    mounted(){
        this.getpasiens();
        this.getResults();
    },

    computed:{
      filteredpasiens() {
        return this.pasien.filter(pasien=>{
          return pasien.nama.includes(this.search)
        })
      }
    },


    methods: {

        getResults(page = 1) {
            axios.get('api/pasien/ambilpasien?page=' + page)
              .then(response => {
                this.pasiens = response.data;
              });
          },
    

         async getpasiens() {
                let response = await axios.get('api/pasien/ambilpasien');
                this.pasiens = response.data
                },
    }





}
</script>

