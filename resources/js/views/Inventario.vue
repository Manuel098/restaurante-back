<template>
  <div>
    <v-container class="text-center display-1">
      Inventario
      <hr
        style="border-color:orange; width:90px; margin-left:auto; margin-right:auto; border-bottom-width:3px;"
      />
    </v-container>
    <DataTable />
  </div>
</template>
<script>
import DataTable from "../components/DataTableInventario";
export default {
  components: {
    DataTable
  }
};
</script>