<template>
  <div class="wrapper menu__container">
    <div class="row">
      <div class="col-md-8">
        <card-component>
          <template v-slot:title>My Menu</template>
          <template v-slot:main>
            <div class="section mb-3">
              <label for="selector">Select a category</label>
              <multiselect
                v-model="menu"
                :options="categories"
                :close-on-select="true"
              >
              </multiselect>
            </div>
            <div class="section">
              <label for="selector">Menu items for this category</label>
              <menu-group :items="currentMenuItems"></menu-group>
            </div>
          </template>
        </card-component>
      </div>
      <div class="col-md-4">
        <card-component>
          <template v-slot:title>Add Menu Item</template>
          <template v-slot:main>
            <menu-add-form
              :categories="categories"
              :resto-id="restoId"
              v-on:newItemAdded="addNewItem"
            ></menu-add-form>
          </template>
        </card-component>
      </div>
    </div>
  </div>
</template>

<script>
import _ from "lodash";
import Multiselect from "@vueform/multiselect";
import MenuGroup from "./MenuGroups.vue";
import MenuAddForm from "./MenuAddForm.vue";
export default {
  props: ["items", "restoId"],
  components: {
    Multiselect,
    MenuGroup,
    MenuAddForm,
  },
  created() {
    _.forEach(this.items, (item, key) => {
      this.categories.push(key);
    });
    this.menu = this.categories[0];
    this.localItems = this.items;
  },
  data() {
    return {
      localItems: "",
      menu: "",
      categories: [],
    };
  },
  computed: {
    currentMenuItems() {
      return this.localItems[this.menu];
    },
  },
  methods: {
    addNewItem(item, category) {
      this.localItems[category].unshift(item);
    },
  },
};
</script>
