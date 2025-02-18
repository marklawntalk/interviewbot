<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <div class="flex">
        <div id="sidebar" class="min-w-[200px] bg-blue-300 min-h-screen p-4">
            <nav>
                <ul>
                    <li><NavLink :href="route('screen1')">Screen 1</NavLink></li>
                    <li><NavLink :href="route('screen2')">Screen 2</NavLink></li>
                    <li><NavLink :href="route('screen3')">Screen 3</NavLink></li>
                </ul>
            </nav>
        </div>
        <div id="main" class=" justify-center flex align-middle flex-grow">
            <div class="main-inner min-h-screen w-full text-center flex justify-center">
                <div class="mx-auto my-auto">Main Content</div>
            </div>
        </div>
    </div>
</template>
