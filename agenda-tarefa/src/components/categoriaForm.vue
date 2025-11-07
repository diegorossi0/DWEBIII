<script setup>
    import { ref } from 'vue';
    import categoriaTable from './categoriaTable.vue';
    import { useCategoriaStore } from 
        '@/stores/categoriaStore';

    const categoriaStore = useCategoriaStore();
    
    const dados = ref({
        nome:"",
        cor:"#000000"
    });

    function salvar(){
        if(edicao.value){
            categoriaStore.atualizar(
                dados.value.idcategoria, dados.value);
        }else{
            categoriaStore.adicionar(dados.value);
        }
        limpaCampo();
        alert("Operação realizada com sucesso");
    }

    function limpaCampo(){
        dados.value = {
            nome:"",
            cor:"#000000"
        };
        edicao.value = false;
    }

    const edicao = ref(false);

    function alterar(item){
        //console.log(item);
        dados.value = {...item};
        edicao.value = true;
    }
</script>

<template>
    <v-card>
        <v-card-title 
            class="d-flex align-center pa-4">
            Categorias
        </v-card-title>
        <v-divider></v-divider>
        <v-card-text>
            <v-container>
                <v-row>
                    <v-col cols="2"></v-col>
                    <v-col cols="8">
                        <v-text-field label="Nome" 
                            v-model="dados.nome">
                        </v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="2"></v-col>
                    <v-col cols="8">
                        <v-text-field
                            type="color"
                            label="Cor"
                            v-model="dados.cor">
                        </v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col class="text-right">
                        <v-btn variant="outlined" color="deep-orange-darken-1"
                        @click="limpaCampo">Cancelar</v-btn>
                        <v-btn color="deep-orange-darken-1"
                        @click="salvar">Gravar</v-btn>
                    </v-col>
                </v-row>
            </v-container>
        </v-card-text>
    </v-card>
    <categoriaTable @edit="alterar" />
</template>
<style scoped>
    button{
        margin: 5px;
    }
</style>