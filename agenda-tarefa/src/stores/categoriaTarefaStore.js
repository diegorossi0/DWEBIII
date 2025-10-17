import { defineStore } from "pinia";

export const useCategoriaTarefaStore =
defineStore('categoria_tarefa', {
    state:() => ({
        categoria_tarefas: []
    }),
    actions: {
        async exibir(){
            try{
                const dados = api.get(
                '/categoria_tarefas');
                this.categoria_tarefas = dados.data;
                console.log("dados carregados");
                return true;
            }catch(erro){
                console.log("Erro ao carregar os dados da categoria_tarefa",erro);
                return false;
            }
        },
        async adicionar(categoria_tarefa){
            try{
                const dados = await api.post('/categoria_tarefas', {
                    idtarefa: categoria_tarefa.idtarefa,
                    idcategoria: categoria_tarefa.idcategoria
                });

                this.categoria_tarefas.push(dados.data);
                return true;
            }catch(erro){
                console.log("Erro ao inserir a categoria_tarefa", erro);
                return false;
            }
        },

        async atualizar(id, categoria_tarefa){
            try{
                const dados = api.put(`/categoria_tarefas/${id}`,{
                    idtarefa: categoria_tarefa.idtarefa,
                    idcategoria: categoria_tarefa.idcategoria
                });

                const index = this.categoria_tarefas.findIndex(item => item.idcategoria_tarefa===id);
                if(index!==-1){
                    this.categoria_tarefas[index] = { ...this.categoria_tarefas[index], ...dados.data};
                }
                return true;
            }catch(erro){
                console.log("Erro ao alterar a categoria_tarefa",erro);
                return false;
            }
        },

        async apagar(id){
            try{
                await api.delete(`/categoria_tarefas/${id}`);

                this.categoria_tarefas = this.categoria_tarefas.filter(item => 
                    item.idcategoria_tarefa !== id);

                return true;
            }catch(erro){
                console.log("Erro ao apagar a categoria_tarefa",erro);
                return false;
            }
        }

    }
})