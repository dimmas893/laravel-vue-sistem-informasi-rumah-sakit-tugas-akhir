<template>
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data pasien</h4>
                 
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
                        <tr v-for="(pasien, index) in filteredpasiens" :key="pasien.id">
                          
                            <td>{{ index+1 }}</td>
                            <td>{{ pasien.nama }}</td>
                             <td>
                                <router-link data-toggle="modal" data-target="#staticBackdrop" :to="{ name: 'showpasienhome', params: { pasien: pasien.nama } }"  type="submit" class="badge badge-info"><i class="fas fa-search"></i></router-link> 
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
            pasiens:[],
            search:'',
        }
    },

    computed:{
      filteredpasiens() {
        return this.pasiens.filter(pasien=>{
          return pasien.nama.includes(this.search)
        })
      }
    },

    mounted(){
        this.getpasiens();
    },


    methods: {
         async getpasiens() {
                let response = await axios.get('api/pasien/ambilpasien');
                this.pasiens = response.data
                },
    }





}
</script>

