<template>
   <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Listado de Ordenes</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0" style="display: block;">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          Id
                      </th>
                      <th style="width: 15%">
                          Nombre
                      </th>
                      <th >
                         Fecha
                      </th>
                      <th style="width: 30%">
                         Descripción
                      </th>
                     
                      <th style="width: 8%" class="text-center">
                          Estado
                      </th>
                      <th style="width: 25%" class="text-right">
                          Opciones
                      </th>
                  </tr>
              </thead>
              <tbody>
                
                  <tr v-for="item in 10" :key="item">
                      <td>
                         25369
                      </td>
                      <td>
                          <a>
                             Projecto
                          </a>
                          <br>
                         
                      </td>
                      <td>
                          <small>
                              Created 01.01.2019
                          </small>
                      </td>
                      <td class="project_progress">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates maxime veritatis distinctio expedita provident perspiciatis magnam pariatur fugiat animi aspernatur ipsa aliquam error labore, a sapiente vero ab officiis. Maiores!
                      </td>
                      <td class="project-state">
                          <span class="badge badge-success">Activo</span>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm " href="#">
                              <i class="fas fa-eye">
                              </i>
                             
                          </a>
                          <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                             
                          </a>
                      </td>
                  </tr>
                 
              
                
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
</template>

<script>
export default {
    data(){
        return {

        }
    }


}



</script>

<style>

</style>
