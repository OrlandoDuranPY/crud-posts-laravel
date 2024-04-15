import { createApp } from 'vue'
import App from './App.vue'
import axios from 'axios'

// import Oruga
import Oruga from '@oruga-ui/oruga-next'

// import Oruga theme styling
// import '@oruga-ui/theme-oruga/dist/oruga.css'

// import Oruga Bootstrap theme config
import { bootstrapConfig } from '@oruga-ui/theme-bootstrap'

// import Bootstrap and Oruga styling
import '@oruga-ui/theme-bootstrap/dist/bootstrap.css'

const app = createApp(App)

// Configura globalProperties después de createApp()
app.config.globalProperties.$axios = axios
window.axios = axios

// Usa Oruga y monta la aplicación
app.use(Oruga, bootstrapConfig).mount('#app')
