<template>
  <div class="conatiner-fluid">

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="/images/avatar3.png" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{currentUser.username}}</h3>

                <p class="text-muted text-center">Desarrollador Web</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Rol</b>
                    <br>
                    <ul>
                        <li v-for="(role, index) in currentUser.roles" :key="index">
                            <p>{{role}}</p>
                        </li>

                    </ul>
                  </li>
                  <li class="list-group-item">
                    <b>Correo</b> <a class="float-right">{{currentUser.email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Token</b> <a class="float-right">{{currentUser.accessToken.substring(0,20)}}
                        {{currentUser.accessToken.substr(currentUser.accessToken.length - 20)}}</a>
                  </li>


                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Información </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Descripción</strong>

                <p class="text-muted">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta ea perferendis officia, eligendi fugit iure asperiores dolorum quia unde, aspernatur modi fuga, hic illo sint possimus natus soluta harum? Magnam.
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Localizaciób</strong>

                <p class="text-muted">Bogota</p>

                <hr>



                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Telefono</strong>

                <p class="text-muted">310 250 6389</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Editar</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <div class="tab-pane active" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Nombre">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Correo">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Telefono</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Telefono">
                        </div>
                      </div>



                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Actualizar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
</template>

<script>
export default {
    name: 'Profile',
    computed: {
        currentUser(){
            return this.$store.state.auth.user;
        }
    },
    mounted(){
        if(!this.currentUser) {
            this.$router.push('/login')
        }
    },
    data() {
        return {

        }
    }

}
</script>

<style>

</style>
