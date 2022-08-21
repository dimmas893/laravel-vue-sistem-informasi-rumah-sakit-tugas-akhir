<template>
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data kelas</h4>
                 
                  <div class="card-header-action">
                  </div>
            
                <input type="text" v-model="search" placeholder="search">
                <router-link to="/createkelas" type="submit" class="btn btn-primary">tambah</router-link>
                 
                </div>  
                
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                      <thead>
                        <tr>
                          <th>no</th>
                          <th>foto</th>
                          <th>nama</th>
                          <th>harga</th>
                          <th>aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(kelas, index) in filteredkelass" :key="kelas.id">
                          
                            <td>{{ index+1 }}</td>
                             <td><img :src="'/img/kelas/' + kelas.image" height="100px" width="100px"></td>
                            <td>{{ kelas.nama }}</td>
                            <td>{{ kelas.harga }}</td>
                            <td>

                          
                                <router-link :to="{ name: 'showkelas', params: { kelas: kelas.nama } }"  type="submit" class="badge badge-info"><i class="fas fa-search"></i></router-link> ||
                                <router-link :to="{ name: 'kelasedit', params: { kelas: kelas.nama } }" type="submit" class="badge badge-warning"><i class="fas fa-pen"></i></router-link> ||
                                  <delete-Note :endpoint="kelas.nama"/>
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
            kelass:[],
            search:'',
        }
    },

    computed:{
      filteredkelass() {
        return this.kelass.filter(kelas=>{
          return kelas.nama.includes(this.search)
        })
      }
    },

    mounted(){
        this.getkelass();
    },


    methods: {
         async getkelass() {
                let response = await axios.get('api/kelas/ambilkelas');
                this.kelass = response.data
                },
    }





}
</script>

