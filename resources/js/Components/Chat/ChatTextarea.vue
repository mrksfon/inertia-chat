<script setup>
import {ref} from "vue";

const emit = defineEmits()

const shift = ref(false)
const model = ref()
const handleEnter = () => {
    if(shift.value && model.value.length){
        model.value = model.value + '\n'
        return
    }
    if(model.value.length){
        emit('valid',model.value)
        model.value = ''
    }
}
</script>

<template>
    <textarea
              v-model="model"
              class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
              id="body"
              rows="4"
              v-on:keydown.enter.prevent="handleEnter"
              v-on:keydown.shift="shift = true"
              v-on:keyup="shift = false"

    />
</template>

