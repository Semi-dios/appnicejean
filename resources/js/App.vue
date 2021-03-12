<template>
<div class="wrapper" v-if="this.$route.meta.requiresAuth" >
    <Header></Header>
    <Sidebar></Sidebar>
  <div class="content-wrapper" style="min-height: 956.3px;">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
            <div class="col-sm-12">
                 <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Contacts</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/#/dashboard">Inicio</a></li>
                            <li class="breadcrumb-item active">Contacts</li>
                            </ol>
                        </div>
                        </div>
                    </div><!-- /.container-fluid -->
                    </section>
                <router-view></router-view>
            </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
</div>
<div v-else>
    <router-view></router-view>
</div>
</template>

<script>
import Header from './components/partials/Header'
import Sidebar from './components/partials/Sidebar'

export default {
    components:{
        Header,
        Sidebar

    }
}
</script>

<style>

</style>
