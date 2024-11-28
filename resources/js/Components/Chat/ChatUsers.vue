<script setup>
import {useUsersStore} from "@/Store/useUsersStore.js";

const usersStore = useUsersStore();
</script>

<template>
    <h2 class="text-lg font-semibold">Users online ({{ usersStore.count }})</h2>

    <ul class="space-y-1 mt-3 ">
        <li
            v-for="user in usersStore.allUsers"
            :key="user.id"
            class="bg-gray-100 rounded-lg px-3 py-1 flex items-center justify-between"
        >
            <span>{{ user.name }} </span>

            <svg
                :class="{ 'opacity-100': user.typing }"
                class="size-4 animate-bounce opacity-0 transition-opacity"
                fill="none"
                stroke="currentColor"
                stroke-width="1.5"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"
                    stroke-linecap="round"
                    stroke-linejoin="round"/>
            </svg>
        </li>
    </ul>
</template>
