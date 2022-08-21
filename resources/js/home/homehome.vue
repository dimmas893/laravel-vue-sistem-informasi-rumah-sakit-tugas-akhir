<template>
   <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Data Pasien</span>
                <span class="info-box-number">
                    {{pasiens}}
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Data Obat</span>
                <span class="info-box-number">{{ obats }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Data Kelas</span>
                <span class="info-box-number">{{kelass}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Data Dokter</span>
                <span class="info-box-number">{{ dokters }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

</template>

<script>
export default {
    data() {
        return {
            pasiens:[],
            obats:[],
            kelass:[],
            dokters:[],
        }
    },


    mounted(){
        this.getpasiens();
        this.getobats();
        this.getkelass();
        this.getdokters();
    },


    methods: {
         async getpasiens() {
                let response = await axios.get('api/pasien/hitungpasien');
                this.pasiens = response.data
                },

         async getobats() {
                let response = await axios.get('api/obat/hitungobat');
                this.obats = response.data
                },

         async getkelass() {
                let response = await axios.get('api/kelas/hitungkelas');
                this.kelass = response.data
                },

         async getdokters() {
                let response = await axios.get('api/dokter/hitungdokter');
                this.dokters = response.data
                },
    }



}
</script>