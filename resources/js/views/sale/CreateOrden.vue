<template>
   <section class="content">
      <div class="row d-flex justify-content-center">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Crear nueva orden</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Nombre:</label>
                <input type="text" id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputDescription">Descripción:</label>
                <textarea id="inputDescription" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="inputStatus">Estado:</label>
                <select class="form-control custom-select">
                  <option selected="" disabled="">Seleccione un estado</option>
                  <option>Activo</option>
                  <option>Cancelado</option>
                  <option>Suspendido</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Cliente:</label>
                <input type="text" id="inputClientCompany" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Encargado:</label>
                <input type="text" id="inputProjectLeader" class="form-control">
              </div>
               <div class="form-row">
              <div class="form-group col-12">
                <a href="/#/dashboard/sale" class="btn btn-secondary">Cancelar</a>
                <input type="submit" value="Crear nueva orden" class="btn btn-success float-right">
              </div>
            </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

      </div>
     
    </section>
</template>

<script>
export default {

}
</script>

<style>

</style>
