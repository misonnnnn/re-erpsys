
<template>
    <div class="modal fade" id="mainModal" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="main-modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">{{ modalTitle }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <component :is="component"></component>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
  props: ['modalTitle', 'component']
}
</script>

