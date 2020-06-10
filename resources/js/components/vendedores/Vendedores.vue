<template>
  <div>
    <table class="table">
      <tbody> 
        <tr v-for="vendedor in vendedores.data" v-if="vendedores.data.length > 0">
          <th scope="row">{{ vendedor.id }}</th>
          <td>{{ vendedor.nome }}</td>
          <td>{{ vendedor.email }}</td>
          <td>{{ vendedor.comissao }}%</td>
          <td class="d-flex">
            <div class="btn ml-auto p-0 btn-wrapper wrap-border">
              <a class="btn btn-primary" :href="'/vendedores/'+vendedor.id+'/vendas'">
                Listar vendas
              </a>
            </div>
          </td>
        </tr>
        <tr v-if="vendedores.data.length == 0">
          <div class="text-center mt-3">
            Não existem vendedores cadastrados!
          </div>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
  export default {
    name: 'Vendedores',
    data() {
      return {
        vendedores: {
          data: []
        }
      }
    },
    mounted() {
      this.getVendedores();
    },
    methods: {
      async getVendedores() {
        axios.get('/api/vendedores').then((response) => {
          this.vendedores = response.data
        });
      }
    }
  }
</script>
