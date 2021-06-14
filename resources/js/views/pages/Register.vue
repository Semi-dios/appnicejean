<template>
 <div class="container-fluid " id="viewRegister">
     <div class="row d-flex justify-content-center ">
         <div class="col-sm-12 ">
             <div class="custom-card card">
                        <div class="card-body register-card-body">
                        <p class="login-box-msg">Ingrese la información de registro</p>

                        <form  name="form" @submit.prevent="handleRegister" >
                            <div class="form-row">
                                  <div class="input-group col-sm-12 mb-3">
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
                                  </div>
                                  <div class="input-group col-sm-12">
                                    <div
                                    v-if="submitted && errors.has('username')"
                                    class="custom-alert d-flex  custom-alert-danger">
                                        {{errors.first('username')}}
                                    </div>
                                  </div>
                            </div>
                            <div class="form-row">
                                  <div class="input-group col-sm-12 mb-3">
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

                                </div>

                                <div class="input-group col-sm-12">
                                     <div
                                      v-if="submitted && errors.has('email')"
                                      class="custom-alert d-flex  custom-alert-danger">
                                      {{errors.first('email')}}
                                  </div>
                                </div>
                            </div>
                            <div class="form-row">
                                    <div class="input-group col-sm-12 mb-3">
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

                                    </div>
                                    <div class="input-group col-sm-12">
                                         <div
                                            v-if="submitted && errors.has('password')"
                                            class="custom-alert  d-flex  custom-alert-danger">
                                            {{errors.first('password')}}
                                        </div>
                                    </div>
                            </div>

                          <div class="form-row">
                                    <div class="input-group mb-3 col-sm-12">
                                        <input   v-model="data.password_confirmation"
                                        v-validate="'required|confirmed:password'" vid="password" class="form-control" name="password_confirmation" type="password" placeholder="Confirmar contraseña" data-vv-as="password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                            </div>
                                        </div>

                                        </div>
                                        <div class="input-group col-sm-12">
                                             <div
                                            v-if="submitted && errors.has('password_confirmation')"
                                            class="custom-alert d-flex custom-alert-danger">
                                            {{errors.first('password_confirmation')}}
                                            </div>
                                </div>
                          </div>
                          <div class="form-row">
                              <div class="form-group col-sm-12">

                                <select  v-model="data.roles" class="form-control">
                                <option v-for="(rol,index) in roles" :key="index"  v-bind:value="rol.value">{{rol.name}}</option>

                                </select>
                            </div>


                          </div>
                            <div class="row">
                           <div class="col-sm-12 ">
                                <div class="custom-check">
                                    <input type="checkbox" id="agreeTerms" class="custom-control-input" name="terms" value="agree">
                                    <label for="agreeTerms" class="custom-control-label">
                                    Aceptar <a href="#">terminos</a>
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-12 mb-3">
                                <button type="submit" class="custom-btn custom-btn-primary d-flex justify-content-center">Registrarse</button>
                            </div>
                            <!-- /.col -->
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <div class="custom-alert"
                                v-if="submitted "
                                :class="successful ? 'custom-alert-success':'custom-alert-danger'"
                                >{{message}}</div>

                            </div>
                            <div class="col-sm-12 text-center">
                                <a type="button" @click="viewLogin()" class="text-center">Ya tengo una cuenta !</a>
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


                        </div>
                        <!-- /.form-box -->
                    </div><!-- /.card -->
         </div>
     </div>
 </div>
</template>

<script>
import { mapActions } from "vuex";
export default {
    name: 'Register',
    data(){
        return{
            data: {
            username: '',
            email: '',
            password: '',
            password_confirmation : '',
            roles: ''


            },
            submitted: false,
            successful:false,
            message: '',
            title :'Registro',roles:  [
                {
                    value: 1,
                    name: 'Admin'
                },
                {
                    value: 2,
                    name: 'Operador'
                },
                {
                    value: 3,
                    name: 'Vendedor'
                },
                {
                    value: 4,
                    name: 'Otro'
                },
            ]


        };
    },
    computed:{

    },
    mounted(){
        /* this.setInfoRol(); */
    },
    methods: {
        ...mapActions(["Register"]),
        viewLogin(){
        this.title = 'Iniciar Sesión';
        var  show=  true;
        this.$emit('viewShowI', `${this.title}`, show);
      },
         handleRegister() {

            this.message = '';
            this.submitted = true;

            this.$validator.validate().then(isValid => {
                if(isValid) {
                    this.submit();
                }
            });
        },
        async submit (){
             try {
                await this.Register(this.data);
                this.message = 'Usuario Creado !';
                 this.successful = true;
            } catch (error) {
                 this.message = 'Error al crear el usuario Creado !';
                         console.log(error.toString());
                            this.successful = false;
            }
        },
        setInfoRol(){
            this.axios
            .post('api/roles')
            .then(response => {
                console.log(res);
            })
            .catch(error=>{console.log(error)});


        }
    }
}
</script>

<style>

</style>
