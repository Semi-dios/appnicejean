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

                        <form action="#" method="post">
                            <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nombre">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-user"></span>
                                </div>
                            </div>
                            </div>
                            <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Correo">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            </div>
                            <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Contraseña">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            </div>
                            <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Confirmar contraseña">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                </div>
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

                        <div class="social-auth-links text-center">
                            <p>- O -</p>
                            <a href="#" class="btn btn-block btn-primary">
                            <i class="fab fa-facebook mr-2"></i>
                            Registrarse con Facebook
                            </a>
                            <a href="#" class="btn btn-block btn-danger">
                            <i class="fab fa-google-plus mr-2"></i>
                            Registrarse con Google+
                            </a>
                        </div>

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
export default {

}
</script>

<style>

</style>
