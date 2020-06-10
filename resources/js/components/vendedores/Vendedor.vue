<template>
  <div>
    <div class="card-header d-flex justify-content-between">
      Vendas realizadas por {{ vendedor.nome }}
    </div>
    <table class="table">
      <tbody> 
        <tr v-for="venda in vendedor.vendas" v-if="vendedor.vendas.length > 0">
          <th scope="row">{{ venda.id }}</th>
          <td>{{ venda.valorFormatado }}</td>
          <td>{{ venda.data }}</td>
          <td>{{ venda.comissaoFormatada }}</td>
        </tr>
        <tr v-if="vendedor.vendas.length == 0">
          <div class="text-center m-2">
            Não existem vendas cadastradas para esse vendedor!
          </div>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
  import moment from 'moment'

  export default {
    name: 'Vendedor',
    props: {
      'id': String
    },
    data() {
      return {
        vendedor: {
          vendas: []
        }
      }
    },
    mounted() {
      this.getVendedor();
    },
    methods: {
      async getVendedor() {
        axios.get('/api/vendedores/'+this.id).then((response) => {
          console.log(response);
          this.vendedor = response.data

          this.vendedor.vendas.map((venda) => venda.data = moment(venda.data).format('DD/MM/Y hh:mm'))

          this.vendedor.vendas.map((venda) => {
            venda.comissao = (venda.valor * (this.vendedor.comissao/100)).toFixed(2)
            venda.valorFormatado = venda.valor.includes('.') ? 'R$ ' + venda.valor.replace('.',',') : 'R$ ' + venda.valor + ',00'
            venda.comissaoFormatada = venda.comissao.toString().includes('.') ? 'R$ ' + venda.comissao.toString().replace('.',',') : ' R$ ' + venda.comissao + ',00'
          })
        });
      }
    }
  }
</script>