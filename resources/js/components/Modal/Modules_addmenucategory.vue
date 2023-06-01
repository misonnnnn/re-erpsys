<template>
    <div class="modal-body">
        <form @submit.prevent="addMenuCategory">
            <div>
                <label>Category Name</label>
                <input type="text" class="form-control shadow-none " v-model="categoryname" placeholder="categoryname">
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
axios.defaults.headers.common['X-XSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content;

export default {
  data() {
    return {
      categoryname: '',
    };
  },
  methods: {
    addMenuCategory() {
        axios.post('/insert/menucategory', {
            categoryname: this.categoryname,
        })
        .then(response => {
            console.log(response.data)
            this.$emitter.emit('updateModule', response.data);
        })
        .catch(error => {

        });
    }
  }
};
</script>