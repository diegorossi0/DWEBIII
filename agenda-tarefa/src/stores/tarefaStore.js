import { defineStore } from "pinia";
import api from "@/plugins/axios";

export const useTarefaStore =
defineStore('tarefa', {
    state:() => ({
        tarefas: []
    }),
    actions: {
        async exibir(){
            try{
                const dados = await api.get(
                '/tarefas');
                this.tarefas = dados.data;
                console.log("dados carregados");
                return true;
            }catch(erro){
                console.log("Erro ao carregar os dados da tarefa",erro);
                return false;
            }
        },
        async adicionar(tarefa){
            try{
                const dados = await api.post('/tarefas', {
                    titulo: tarefa.titulo,
                    descricao: tarefa.descricao,
                    prioridade: tarefa.prioridade,
                    status: tarefa.status,
                    inicio: tarefa.inicio,
                    fim: tarefa.fim
                });

                this.tarefas.push(dados.data);
                return true;
            }catch(erro){
                console.log("Erro ao inserir a tarefa", erro);
                return false;
            }
        },

        async atualizar(id, tarefa){
            try{
                const dados = api.put(`/tarefas/${id}`,{
                    titulo: tarefa.titulo,
                    descricao: tarefa.descricao,
                    prioridade: tarefa.prioridade,
                    status: tarefa.status,
                    inicio: tarefa.inicio,
                    fim: tarefa.fim
                });

                const index = this.tarefas.findIndex(item => item.idtarefa===id);
                if(index!==-1){
                    this.tarefas[index] = { ...this.tarefas[index], ...dados.data};
                }
                return true;
            }catch(erro){
                console.log("Erro ao alterar a tarefa",erro);
                return false;
            }
        },

        async apagar(id){
            try{
                await api.delete(`/tarefas/${id}`);

                this.tarefas = this.tarefas.filter(item => 
                    item.idtarefa !== id);

                return true;
            }catch(erro){
                console.log("Erro ao apagar a tarefa",erro);
                return false;
            }
        }

    }
})