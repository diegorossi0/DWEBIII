import { createApp } from 'vue'
import { createPinia } from 'pinia'
import api from '@/plugins/axios'
import vuetify from '@/plugins/vuetify'

import App from './App.vue'
import router from './router'

const app = createApp(App)

app.use(vuetify)
app.use(api)
app.use(createPinia())
app.use(router)

app.mount('#app')
