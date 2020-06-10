<template>
  <div>
    <table class="table">
      <tbody> 
        <tr v-for="venda in vendas.data" v-if="vendas.data.length > 0">
          <th scope="row">{{ venda.id }}</th>
          <td>{{ venda.valor }}</td>
          <td>{{ venda.data }}</td>
          <td>{{ venda.vendedor.nome }}</td>
        </tr>
        <tr v-if="vendas.data.length == 0">
          <div class="text-center m-2">
            Não existem vendas cadastradas!
          </div>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
  import moment from 'moment'

  export default {
    name: 'Vendas',
    data() {
      return {
        vendas: {
          data: []
        }
      }
    },
    mounted() {
      this.getVendedores();
    },
    methods: {
      async getVendedores() {
        axios.get('/api/vendas').then((response) => {
          this.vendas = response.data

          this.vendas.data.map((venda) => venda.data = moment(venda.data).format('DD/MM/Y hh:mm'))
          this.vendas.data.map((venda) => {
            venda.valor = venda.valor.includes('.') ? 'R$ ' + venda.valor.replace('.',',') : 'R$ ' + venda.valor + ',00'
          });
        });
      }
    }
  }
</script>
