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
}];
onMounted(()=>{
    tarefaStore.exibir();
})
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

                </v-data-table>
            </v-card-text>
        </v-card>
    </v-container>
</template>