<template>
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data obat</h4>
                 
                  <div class="card-header-action">
                  </div>
            
                <input type="text" v-model="search" placeholder="search">
                <router-link to="/createobat" type="submit" class="btn btn-primary">tambah</router-link>
                 
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
                        <tr v-for="(obat, index) in filteredobats" :key="obat.id">
                          
                            <td>{{ index+1 }}</td>
                             <td><img :src="'/img/obat/' + obat.image" height="100px" width="100px"></td>
                            <td>{{ obat.nama }}</td>
                            <td>{{ obat.harga }}</td>
                            <td>

                          
                                <router-link :to="{ name: 'showobat', params: { obat: obat.nama } }"  type="submit" class="badge badge-info"><i class="fas fa-search"></i></router-link> ||
                                <router-link :to="{ name: 'editobat', params: { obat: obat.nama } }" type="submit" class="badge badge-warning"><i class="fas fa-pen"></i></router-link> ||
                                  <delete-Note :endpoint="obat.nama"/>
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
            obats:[],
            search:'',
        }
    },

    computed:{
      filteredobats() {
        return this.obats.filter(obat=>{
          return obat.nama.includes(this.search)
        })
      }
    },

    mounted(){
        this.getobats();
    },


    methods: {
         async getobats() {
                let response = await axios.get('api/obat/ambilobat');
                this.obats = response.data
                },
    }





}
</script>

