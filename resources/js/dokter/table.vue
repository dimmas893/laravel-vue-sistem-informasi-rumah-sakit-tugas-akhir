<template>
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data Dokter</h4>
                 
                  <div class="card-header-action">
                  </div>
            
                <input type="text" v-model="search" placeholder="search">
                <router-link to="/createdokter" type="submit" class="btn btn-primary">tambah</router-link>
                 
                </div>  
                
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                      <thead>
                        <tr>
                          <th>no</th>
                          <th>foto</th>
                          <th>nama</th>
                          <th>specialis</th>
                          <th>jam</th>
                          <th>aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(dokter, index) in filteredDokters" :key="dokter.id">
                          
                            <td>{{ index+1 }}</td>
                             <td><img :src="'/img/dokter/' + dokter.image" height="100px" width="100px"></td>
                            <td>{{ dokter.nama }}</td>
                            <td>{{ dokter.specialis }}</td>
                            <td>{{ dokter.jam }}</td>
                            <td>

                          
                                <router-link :to="{ name: 'doktershow', params: { dokter: dokter.nama } }"  type="submit" class="badge badge-info"><i class="fas fa-search"></i></router-link> ||
                                <router-link :to="{ name: 'dokteredit', params: { dokter: dokter.nama } }" type="submit" class="badge badge-warning"><i class="fas fa-pen"></i></router-link> ||
                                  <delete-Note :endpoint="dokter.nama"/>
                           </td>
                      
                        </tr>
                       
                      </tbody>
                    </table>
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
            dokters:[],
            search:'',
        }
    },

    computed:{
      filteredDokters() {
        return this.dokters.filter(dokter=>{
          return dokter.nama.includes(this.search)
        })
      }
    },

    mounted(){
        this.getdokters();
    },


    methods: {
         async getdokters() {
                let response = await axios.get('api/dokter/ambildokter');
                this.dokters = response.data
                },
    }





}
</script>

