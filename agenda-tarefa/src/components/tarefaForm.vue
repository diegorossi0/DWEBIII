<script setup>
    import { ref } from 'vue';
    import { useTarefaStore } from 
        '@/stores/tarefaStore';
    import tarefaTable from 
        './tarefaTable.vue';

    const tarefaStore = useTarefaStore();
    const dados = ref({
        titulo:"",
        descricao:"",
        prioridade:"",
        status:"",
        inicio:"",
        fim:""
    });

    function salvar(){
        tarefaStore.adicionar(dados.value);
        limpaCampo();
        alert("Operação realizada com sucesso!");
    }

    function limpaCampo(){
        dados.value = {
            titulo:"",
            descricao:"",
            prioridade:"",
            status:"",
            inicio:"",
            fim:""
        }
    }
</script>

<template>
    <v-card>
        <v-card-title 
         class="d-flex align-center pa-4">
            Tarefas
        </v-card-title>
        <v-divider></v-divider>
        <v-card-text>
            <v-container>
                <v-row>
                    <v-col cols="2"></v-col>
                    <v-col cols="8">
                        <v-text-field 
                        label="Título" 
                        v-model="dados.titulo">
                        </v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="2"></v-col>
                    <v-col cols="8">
                        <v-text-field 
                        label="Descrição" 
                        v-model="dados.descricao">
                        </v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="2"></v-col>
                    <v-col cols="8">
                        <v-text-field 
                        label="Prioridade" 
                        v-model="dados.prioridade">
                        </v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="2"></v-col>
                    <v-col cols="8">
                        <v-text-field 
                        label="Status" 
                        v-model="dados.status">
                        </v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="2"></v-col>
                    <v-col cols="8">
                        <v-text-field 
                        type="date"
                        label="Início" 
                        v-model="dados.inicio">
                        </v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="2"></v-col>
                    <v-col cols="8">
                        <v-text-field 
                        type="date"
                        label="Fim" 
                        v-model="dados.fim">
                        </v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col class="text-right">
                        <v-btn variant="outlined"
                        color="deep-orange-darken-1"
                        @click="limpaCampo">
                            Cancelar
                        </v-btn>
                        <v-btn color="deep-orange-darken-1"
                        @click="salvar">
                            Gravar
                        </v-btn>
                    </v-col>
                </v-row>
            </v-container>
        </v-card-text>
    </v-card>
    <tarefaTable></tarefaTable>
</template>