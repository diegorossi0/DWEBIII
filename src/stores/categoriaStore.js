import { defineStore } from "pinia";
import api from '@/plugins/axios'

export const useCategoriaStore =
defineStore('categoria', {
    state:() => ({
        categorias: []
    }),
    actions: {
        async exibir(){
            try{
                const dados =  await api.get(
                '/categorias');
                this.categorias = dados.data;
                console.log("dados carregados", dados);
                return true;
            }catch(erro){
                console.log("Erro ao carregar os dados da categoria",erro);
                return false;
            }
        },
        async adicionar(categoria){
            try{
                const dados = await api.post('/categorias', {
                    nome: categoria.nome,
                    cor: categoria.cor
                });

                this.categorias.push(dados.data);
                return true;
            }catch(erro){
                console.log("Erro ao inserir a categoria", erro);
                return false;
            }
        },

        async atualizar(id, categoria){
            try{
                const dados = await api.put(`/categorias/${id}`,{
                    nome: categoria.nome,
                    cor: categoria.cor
                });

                const index = this.categorias.findIndex(item => item.idcategoria===id);
                if(index!==-1){
                    this.categorias[index] = { ...this.categorias[index], ...dados.data};
                }
                return true;
            }catch(erro){
                console.log("Erro ao alterar a categoria",erro);
                return false;
            }
        },

        async apagar(id){
            try{
                await api.delete(`/categorias/${id}`);

                this.categorias = this.categorias.filter(item => 
                    item.idcategoria !== id);

                return true;
            }catch(erro){
                console.log("Erro ao apagar a categoria",erro);
                return false;
            }
        }

    }
})