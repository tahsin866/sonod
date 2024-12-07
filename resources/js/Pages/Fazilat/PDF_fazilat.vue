<script setup>
import PDF_fazilat from '@/Components/PDF_fazilat.vue'

// Your page logic here
</script>

<template>
    <div>
        <PDF_fazilat
            :roll="form.Roll"
            :reg-id="form.reg_id"
            :sr-type="form.SRType"
        />
    </div>
</template>
