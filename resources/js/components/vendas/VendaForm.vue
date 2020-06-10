<template>
  <div class="card-body mx-2">
    <form method="POST" :action="route">
      <div class="form-group">
        <label>Vendedor</label>
        <select class="form-control" placeholder="Nome do vendedor" name="vendedor" @input="select($event.target.value)">
          <option>Selecione um vendedor</option>
          <option :value="vendedor.id" v-for="vendedor in vendedores.data">{{ vendedor.nome }}</option>
        </select>
      </div>
      <div class="form-group">
        <label>Valor da venda</label>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text">R$</div>
          </div>
          <input type="number" class="form-control" name="valor" step="0.01" v-model="form.valor" placeholder="0,00">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Data da venda</label>
        <input type="datetime-local" v-model="form.data" class="form-control" name="data" aria-describedby="emailHelp">
      </div>
      <div class="btn p-0 btn-wrapper wrap-border">
        <div class="btn btn-primary" @click="save">Salvar</div>
      </div>
    </form>
  </div>
</template>

<script>
  export default {
    name: 'vendas-form',
    props: {
      route: String,
    },
    data() {
      return {
        vendedores: {
          data: []
        },
        form: {
          valor: 0,
          vendedor: null,
          data: null
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
      },
      async save() {
        axios.post('/api/vendas', this.form).then((response) => {
          window.location.href = '/vendas/listar'
        });
      },
      async select(value) {
        this.form.vendedor = value;
        console.log(this.form)
      }
    }
  }
</script>
