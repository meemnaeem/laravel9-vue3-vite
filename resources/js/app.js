import "./bootstrap";
import "@vueform/multiselect/themes/default.css";
import { createApp } from "vue";

const app = createApp({});

import MenuContainer from "./modules/menu/MenuContainer.vue";
app.component("menu-container", MenuContainer);

import RestoGroup from "./modules/restos/RestoGroup.vue";
app.component("resto-group", RestoGroup);

import Card from "./components/Card.vue";
app.component("card-component", Card);

import OrderItems from "./components/OrderItems.vue";
app.component("order-items", OrderItems);

import AlertComponent from "./modules/AlertComponent.vue";
app.component("alert-component", AlertComponent);

import OrderGroup from "./modules/orders/OrderGroup.vue";
app.component("order-group", OrderGroup);

import ManageOrders from "./modules/orders/ManageOrders.vue";
app.component("manage-orders", ManageOrders);

app.mount("#app");
