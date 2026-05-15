import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import router from './router'
import "./assets/styles/Variables.css"
import './assets/styles/Reset.css'
import './assets/styles/Base.css'
import './assets/styles/Components.css'
import './assets/styles/Layout.css'
import './assets/styles/Utilities.css'
import './assets/styles/Animations.css'

createApp(App)
.use(router)
.mount('#app')

    