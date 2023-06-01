<template>
    <div class="modal-body">
        <form @submit.prevent="addMenuCategory">
            <div class="mb-1">
                <label>Module Name</label>
                <input type="text" class="form-control shadow-none " v-model="modulename" placeholder="Module Name">
            </div>
            <div class="mb-1">
                <label>Category</label>
                <select class="form-select form-select-sm  shadow-none " v-model="categoryid">
                    <option  selected disabled>Please select a category</option>
                    <option v-for="category in categories" class="text-capitalize" :value="category.id">{{ category.name }}</option>
                </select>
            </div>
            <div class="mb-1">
                <label>Module URL</label>
                <input type="text" class="form-control shadow-none " v-model="moduleurl" placeholder="Module URL">
            </div>
            <div class="d-flex justify-content-end mt-3">
                <button class="btn btn-dark b1 text-light btnLogin"> Proceed</button>
            </div>
        </form>
    </div>
</template>


<script>
import { useRouter } from 'vue-router';
import axios from 'axios';
// Set the X-XSRF-TOKEN header
axios.defaults.headers.common['X-XSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content;

export default {
  data() {
    return {
      modulename: '',
      moduleurl:null,
      categories : [],
      value : [],
      categoryid: null
    };
  },
  mounted(){
    this.getCategory();
  },
  methods: {
    addMenuCategory() {
        axios.post('/insert/module', {
            modulename: this.modulename,
            categoryid : this.categoryid,
            moduleurl : this.moduleurl,
        })
        .then(response => {
            console.log(response.data)
            this.$emitter.emit('updateModule', response.data);
        })
        .catch(error => {

        });
    },getCategory(){
        axios.get('/api/getallmodulecategory')
        .then(response => {
            this.categories = response.data;
        })
        .catch(error => {

        });
    }
  }
};
</script>