<template>
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data obat</h4>
                 
                  <div class="card-header-action">
                  </div>
            
                <input type="text" v-model="search" placeholder="search">
                 
                </div>  
                
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>NAMA</th>
                          <th>DETAIL</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(obat, index) in filteredobats" :key="obat.id">
                          
                            <td>{{ index+1 }}</td>
                            <td>{{ obat.nama }}</td>
                             <td>
                                <router-link data-toggle="modal" data-target="#staticBackdrop" :to="{ name: 'showobathome', params: { obat: obat.nama } }"  type="submit" class="badge badge-info"><i class="fas fa-search"></i></router-link> 
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
export default {


 



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

