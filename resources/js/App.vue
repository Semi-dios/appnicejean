<template>
<div class="wrapper" >
    <Header></Header>
    <Sidebar></Sidebar>
  <div class="content-wrapper" style="min-height: 956.3px;">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
            <div class="col-sm-12">
                <router-view></router-view>
            </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
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
