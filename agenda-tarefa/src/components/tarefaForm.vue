<script setup>
    import { onMounted, ref } from 'vue';
    import { useTarefaStore } from 
        '@/stores/tarefaStore';
    import tarefaTable from 
        './tarefaTable.vue';
    import { useCategoriaStore } 
    from '@/stores/categoriaStore';
    import { useCategoriaTarefaStore } 
    from '@/stores/categoriaTarefaStore';
    

    const tarefaStore = useTarefaStore();
    const categoriaStore = useCategoriaStore();
    const categoriaTarefaStore = 
        useCategoriaTarefaStore();

    const dados = ref({
        titulo:"",
        descricao:"",
        prioridade:"",
        status:"",
        inicio:"",
        fim:""
    });
    const categorias = ref();

    async function salvar(){
        console.log(categorias.value);
        const resp = await tarefaStore.adicionar(dados.value);
        if(resp!=false){
            categoriaTarefaStore.vincular(
                resp.idtarefa, categorias.value);
            limpaCampo();
            alert("Operação realizada com sucesso!");
        }else{
            alert("Erro ao realizar a operação!");
        }
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

        categorias.value = "";
    }

    onMounted(()=>{
        categoriaStore.exibir();
    });
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
                    <v-col cols="2"></v-col>
                    <v-col cols="8">
                        <v-select 
                        label="Categorias"
                        :items="categoriaStore.categorias"
                        multiple item-title="nome" 
                        item-value="idcategoria"
                        v-model="categorias">
                        </v-select>
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