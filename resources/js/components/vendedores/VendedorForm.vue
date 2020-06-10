<template>
  <div class="card-body mx-2">
    <form method="POST" :action="route">
      <div class="form-group">
        <label>Nome</label>
        <input type="text" class="form-control" name="nome" v-model="form.nome" placeholder="Nome do vendedor">
      </div>
      <div class="form-group">
        <label>E-mail</label>
        <input type="email" class="form-control" name="email" v-model="form.email" placeholder="E-mail@exemplo.com">
      </div>
      <div class="btn p-0 btn-wrapper wrap-border">
        <div class="btn btn-primary" @click="save">Salvar</div>
      </div>
    </form>
  </div>
</template>

<script>
  export default {
    props: {
      route: String,
    },
    name: 'vendedores-form',
    data() {
      return {
        form: {
          nome: '',
          email: ''
        }
      }
    },
    methods: {
      async save() {
        axios.post('/api/vendedores', this.form).then((response) => {
          window.location.href = '/vendedores/listar'
        });
      }
    }
  }
</script>
