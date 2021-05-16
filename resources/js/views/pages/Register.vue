<template>
 <div class="container-fluid">
     <div class="row d-flex justify-content-center ">
         <div class="col-sm-12 col-lg-4">
              <div class="register-box">
                    <div class="register-logo">
                          <a href="/#/"><b>SOD</b></a>
                    </div>

                    <div class="card">
                        <div class="card-body register-card-body">
                        <p class="login-box-msg">Registro</p>

                        <form  name="form" @submit.prevent="handleRegister" >
                            <div class="input-group mb-3">
                            <input type="text"
                            class="form-control" name="username"
                            v-model="data.username"
                            v-validate="'required|min:3|max:20'"
                            placeholder="Nombre">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-user"></span>
                                </div>
                            </div>
                            <div
                                v-if="submitted && errors.has('username')"
                                class="alert-danger">
                                {{errors.first('username')}}
                             </div>
                            </div>
                            <div class="input-group mb-3">
                            <input type="email"
                            class="form-control"
                            placeholder="Correo"
                            v-model="data.email"
                            v-validate="'required|email|max:50'"
                            name="email"
                            >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            <div
                                v-if="submitted && errors.has('email')"
                                class="alert-danger">
                                {{errors.first('email')}}
                             </div>
                            </div>
                            <div class="input-group mb-3">
                            <input type="password"
                            class="form-control"
                            placeholder="Contraseña"
                            v-model="data.password"
                            ref="password"
                            v-validate="'required|min:6|max:40'"
                            name="password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            <div
                                v-if="submitted && errors.has('password')"
                                class="alert-danger">
                                {{errors.first('password')}}
                             </div>
                            </div>
                            <div class="input-group mb-3">
                                <input   v-model="data.password_confirmation"
                                v-validate="'required|confirmed:password'" vid="password" class="form-control" name="password_confirmation" type="password" placeholder="Confirmar contraseña" data-vv-as="password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                <div
                                v-if="submitted && errors.has('password_confirmation')"
                                class="alert-danger">
                                {{errors.first('password_confirmation')}}
                             </div>
                            </div>
                            <div class="row">
                           <div class="col-7">
                                <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                Aceptar <a href="#">terminos</a>
                                </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-5">
                                <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
                            </div>
                            <!-- /.col -->
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert"
                                v-if="submitted "
                                :class="successful ? 'alert-success':'alert-danger'"
                                >{{message}}</div>

                            </div>

                        </div>
                      <!--   <div class="social-auth-links text-center">
                            <p>- O -</p>
                            <a href="#" class="btn btn-block btn-primary">
                            <i class="fab fa-facebook mr-2"></i>
                            Registrarse con Facebook
                            </a>
                            <a href="#" class="btn btn-block btn-danger">
                            <i class="fab fa-google-plus mr-2"></i>
                            Registrarse con Google+
                            </a>
                        </div> -->

                        <a href="/#/Login" class="text-center">Ya tengo una cuenta !</a>
                        </div>
                        <!-- /.form-box -->
                    </div><!-- /.card -->
                    </div>
         </div>
     </div>
 </div>
</template>

<script>
//import User from '../../models/user';
export default {
    name: 'Register',
    data(){
        return{
            data: {
            username: '',
            email: '',
            password: '',
            password_confirmation : ''

            },
            submitted: false,
            successful:false,
            message: ''

        };
    },
    computed:{

    },
    mounted(){
    },
    methods: {
        handleRegister() {
            this.message = '';
            this.submitted = true;
            this.$validator.validate().then(isValid => {
                if(isValid) {
                    this
                    .axios
                    .post('api/auth/register',this.data)
                    .then(
                      response => {
                         this.message = response.data.message;
                        console.log(response.data.message)
                        this.successful = true;
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
            });
        }
    }
}
</script>

<style>

</style>
