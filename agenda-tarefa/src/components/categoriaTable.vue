<script setup>
    import { useCategoriaStore } from 
        '@/stores/categoriaStore';
    import { onMounted, defineEmits } from 'vue';

    const categoriaStore = useCategoriaStore();

    onMounted(() =>{
        categoriaStore.exibir();
    });

    const colunas = [{
        "title":"Nome",
        "key":"nome"
    },{
        "title":"Cor",
        "key":"cor"
    }, {
        "title":"",
        "key":"actions" }];

    function excluir(item){
        //console.log(item);
        let resp = confirm(
        `Você deseja apagar a categoria ${item.nome}?`);
        if(resp){
            categoriaStore.apagar(item.idcategoria);
        }
    }

    //evento personalizado
    const emit = defineEmits(['edit']);
    function alterar(item){
        emit('edit', item);
    }
</script>

<template>
    <v-container>
        <v-card>
            <v-card-title>Lista de categorias</v-card-title>
            <v-card-text>
                <v-data-table 
                    :items="categoriaStore.categorias"
                    :headers="colunas">
                    <template v-slot:item.actions="{ item }">
                        <v-btn icon="mdi-pencil" density="comfortable" @click="alterar(item)"></v-btn>
                        <v-btn icon="mdi-delete" density="comfortable" @click="excluir(item)"></v-btn>
                    </template>
                </v-data-table>
            </v-card-text>
        </v-card>
    </v-container>
</template>

<style scoped>
    button{
        margin: 0 5px;
    }
</style>