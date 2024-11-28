<script setup>
import {ref} from "vue";

const emit = defineEmits()

const shift = ref(false)
const model = ref()
const handleEnter = () => {
    if (shift.value && model.value.length) {
        model.value = model.value + '\n'
        return
    }
    if (model.value.length) {
        emit('valid', model.value)
        model.value = ''
    }
}

let typingTimeout = null
const handleTyping = () => {
    clearTimeout(typingTimeout)
    emit('typing', true)

    typingTimeout = setTimeout(() => {
        handleFinishTyping()
    }, 3000)
}
const handleFinishTyping = () => {
    clearTimeout(typingTimeout)

    emit('typing', false)
}
</script>

<template>
    <textarea
        id="body"
        v-model="model"
        class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        rows="4"
        v-on:keydown="handleTyping"
        v-on:keyup="shift = false"
        v-on:keydown.enter.prevent="handleEnter"
        v-on:keydown.shift="shift = true"

    />
</template>

