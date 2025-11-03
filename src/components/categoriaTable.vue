<script setup>
    import { useCategoriaStore } from 
        '@/stores/categoriaStore';
    import { onMounted } from 'vue';

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
                        <v-btn @click="alterar(item)">Alterar</v-btn>
                        <v-btn @click="excluir(item)">Excluir</v-btn>
                    </template>
                </v-data-table>
            </v-card-text>
        </v-card>
    </v-container>
</template>