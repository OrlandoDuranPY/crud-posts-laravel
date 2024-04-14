import { createApp } from "vue";
import { Oruga } from "@oruga-ui/oruga-next";
import App from "./App.vue";

const app = createApp(App).user(Oruga);

app.mount("#app");
