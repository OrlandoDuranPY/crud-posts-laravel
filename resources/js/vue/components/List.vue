<template>
    <div>
        <h1>Listado de Post</h1>
        <o-button :variant="settings.variant" :size="settings.size" :rounded="settings.rounded" @click="clickMe">
            Click Me
        </o-button>
    </div>
</template>
<script>
export default {
    methods: {
        clickMe () {
         alert('Clicked')
        }
    }
}
</script>
