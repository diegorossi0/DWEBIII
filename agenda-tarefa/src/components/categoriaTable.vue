<script setup>
    import { useCategoriaStore } from 
        '@/stores/categoriaStore';
    import { onMounted } from 'vue';

    const categoriaStore = useCategoriaStore();

    onMounted(() =>{
        categoriaStore.exibir();
    });
</script>

<template>
    <v-container>
        <v-card>
            <v-card-title>Lista de categorias</v-card-title>
            <v-card-text>
                <v-data-table 
                    :items="categoriaStore.categorias">
                </v-data-table>
            </v-card-text>
        </v-card>
    </v-container>
</template>