<template>
<div class="modal fade show" id="modalLogin" style="display: block; padding-right: 17px;" aria-modal="true" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-body">
               <div class="container-fluid" id="viewLogin">
                <div class="row justify-content-center d-flex align-content-center align-items-lg-center ">
                    <div class="col-sm-12">
                        <div class="login-box">
                            <div class="login-logo custom-logo">
                                <a href="/#/"><b>SOD</b></a>
                            </div>
                            <!-- /.login-logo -->
                            <div class="card">
                                <div class="card-body login-card-body" >
                                <p class="login-box-msg">Ingrese sus credenciales</p>

                                <form name="form" @submit.prevent="handlelogin" >
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control" name="email" v-validate="'required'" v-model="data.email" placeholder="Correo">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>

                                        <div class="alert alert-danger" v-if="errors.has('email')" role="danger">El email es requerido</div>
                                    </div>

                                    <div class="input-group mb-3">
                                    <input type="password" class="form-control" name="password" v-validate="'required'" v-model="data.password" placeholder="Contraseña">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                        <div class="alert alert-danger" v-if="errors.has('password')" role="danger">La contraseña es requerida</div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div v-if="message" class="alert alert-danger" role="alert">{{message}}</div>
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
                                        <button type="submit" :disabled="isLoggin" :loading="isLoggin"  class="btn btn-primary btn-block">{{isLoggin ? 'Iniciando' : 'Iniciar Sesión'}}</button>
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
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


</template>

<script>

export default {
    name: 'Login',
data(){
    return {
       data: {
            email: '',
            password: ''
       },
       isLoggin: false,
       message: ''
    }
},
computed: {

},
created(){

},
methods: {
     async handlelogin() {
      this.$isLoggin = true;
       this.$validator.validateAll().then(isValid =>  {
         if(!isValid) {
            this.$isLoggin = false;
           return;
         }
        if (this.data.email && this.data.password) {
            const res =
            this
            .axios
            .post('api/auth/login', this.data)
            .then(
                 response => {
                         this.message = response.data.message;
                        console.log(response.data.message)
                        this.successful = true;
                         this.$isLoggin = true;
                         this.$router.push({ name: "dashboard" })

                      },
            )
            .catch( error => {
                this.message = (error.response.data.message);
                    console.log(error.toString());
                /* this.message =
                    (error.response && error.response.data) ||
                    error.message ||
                    error.toString(); */
                    this.successful = false;

                })


        }

       })

     }
},

mounted(){

}
}
</script>

<style>

</style>


