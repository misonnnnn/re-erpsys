<template>
    <div class="px-4">
        <p class="m-0 p-0 fs-4 primary-color-2">Modules</p>
        <p class="m-0 p-0 primary-color-2">This module is used to manage modules of the system.</p>
        <div class="container-fluid primary-background-2 rounded mt-3 p-3">
            <div class="row">
                <div class="col-lg-5 bg-light rounded shadow-sm p-2">
                    <div class="d-flex justify-content-between p-2">
                        <h6>MODULE CATEGORY</h6>
                        <button class="btn btn-sm btn-danger primary-background-3 text-light" data-bs-toggle="modal"  data-bs-target="#mainModal" @click="addMenuCategoryModal"><i class="bi bi-plus-square"></i> Add Module Category</button>
                    </div>
                    <div class="p-2">
                        <table class="table display table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Module Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="category in modulecategory">
                                    <td class="align-middle text-capitalize">{{ category.name }}</td>
                                    <td class="align-middle"><button class="btn btn-sm btn-dark">Manage</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-7 bg-light rounded shadow-sm p-2">
                    <div class="d-flex justify-content-between p-2">
                        <h6>MODULE</h6>
                        <button class="btn btn-sm btn-danger primary-background-3 text-light" data-bs-toggle="modal"  data-bs-target="#mainModal" @click="addModules"><i class="bi bi-plus-square"></i> Add Module</button>
                    </div>
                    <div class="p-2">
                        <table class="table display table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Module Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="module in modules">
                                    <td class="align-middle text-capitalize">{{ module.name }}</td>
                                    <td class="align-middle"><button class="btn btn-sm btn-dark">Manage</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <modal :modal-title="modalTitle" :component="dynamicComponentName"></modal>
</template>

<script>
import Modal from '../Modal/Modal.vue';
import axios from 'axios';
    export default {
        components: {
            Modal,
        },
        data (){
            return {
                modulecategory  : [],
                modules         : [],
                dynamicComponentName: null, // Default component name
                modalTitle: null, // Default component name
            }
        },
        created() {
            this.$emitter.on('updateModule', this.handleModalClosed);
        },
        mounted(){
            this.getModuleCategory()
            this.getModules()
        },
        methods : {
           getModuleCategory(){
                axios.get('/api/getallmodulecategory')
                    .then(response=>{
                        this.modulecategory = response.data
                    })
                    .catch(response=>{
                        console.log(response)
                    })
           } ,
           getModules(){
                axios.get('/api/getallmodules')
                    .then(response=>{
                        this.modules = response.data
                    })
                    .catch(response=>{
                        console.log(response)
                    })
            },
            addMenuCategoryModal(){
                this.dynamicComponentName   = 'Modules_addmenucategory';
                this.modalTitle             = 'Add Module Category';
            },
            addModules(){
                this.dynamicComponentName   = 'Modules_addmodules';
                this.modalTitle             = 'Add Module ';
            },
            handleModalClosed(){
                this.getModuleCategory()
                this.getModules()
            }
       
        }
    }
</script>