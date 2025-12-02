<script setup>
import { useTarefaStore } from '@/stores/tarefaStore';
import { onMounted, defineEmits } from 'vue';

const tarefaStore = useTarefaStore();
const colunas = [{
    "title":"Título",
    "key":"titulo"
}, {
    "title":"Descrição",
    "key":"descricao"
}, {
    "title":"Status",
    "key":"status"
}, {
    "title":"Categorias",
    "key":"categorias"
}];
onMounted(()=>{
    tarefaStore.exibir();
});

function getColor(cor){
    return `font-weight:bold; color : ${cor}`;
}
</script>

<template>
    <v-container>
        <v-card>
            <v-card-title>
                Lista de tarefas
            </v-card-title>
            <v-card-text>
                <v-data-table 
                    :items="tarefaStore.tarefas"
                    :headers="colunas">
                    <template v-slot:item.categorias="{ item }">
                        <div v-for="categoria in item.categorias"
                        :key="categoria.idcategoria" 
                        :style="getColor(categoria.cor)">
                            {{ categoria.nome }}
                        </div>
                    </template>
                </v-data-table>
            </v-card-text>
        </v-card>
    </v-container>
</template>