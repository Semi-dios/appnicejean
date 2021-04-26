<template>
  <div class="container-fluid" id="viewLogin">
      <div class="row justify-content-center d-flex align-content-center align-items-lg-center ">
          <div class="col-sm-12 col-lg-4">
              <div class="login-box">
                <div class="login-logo custom-logo">
                    <a href="/#/"><b>SOD</b></a>
                </div>
                <!-- /.login-logo -->
                <div class="card">
                    <div class="card-body login-card-body" >
                    <p class="login-box-msg">Ingrese sus credenciales</p>

                    <form autocomplete="off" @submit.prevent="handlelogin" method="post">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="username" v-validate="'required'" v-model="user.email" placeholder="Correo">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                                </div>
                            </div>

                            <div class="alert alert-danger" v-if="errors.has('email')" role="danger">El email es requerido</div>
                        </div>

                        <div class="input-group mb-3">
                        <input type="password" class="form-control"  v-validate="'required'" v-model="password" placeholder="Contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-6">
                            <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Recordarme
                            </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                        </div>
                        <!-- /.col -->
                        </div>
                    </form>

                    <div class="social-auth-links text-center mb-3">
                        <p>- O -</p>
                        <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Inciar con Facebook
                        </a>
                        <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Inciar con Google+
                        </a>
                    </div>
                    <!-- /.social-auth-links -->

                    <p class="mb-1">
                        <a href="/#/forgot">¿Olvidó su contraseña?</a>
                    </p>
                    <p class="mb-0">
                        <a href="/#/register" class="text-center">Registrarse</a>
                    </p>
                    </div>
                    <!-- /.login-card-body -->
                </div>
                </div>
          </div>
      </div>
  </div>
</template>

<script>
import User from '../../models/user'
export default {
    name: 'Login',
data(){
    return {
       user: new User('',''),
       loading: false,
       message: ''
    };
},
methods: {
     login() {

         console.log(this.$store)
         this.$store.dispatch('login',
             {
             email:this.email,
             password: this.password
         })
         .this(response => {
             this.$router.push({name: "dashboard"})
         })
         .catch(error=> {
             this.error = error.response.data;
             console.log(error)
         })
     }
},

mounted(){
    console.log(this.login);
    this.login();
}
}
</script>

<style>

</style>


