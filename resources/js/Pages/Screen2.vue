<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';

import { computed, ref } from 'vue';
import { useForm, router } from '@inertiajs/vue3';
import debounce from "lodash/debounce"
const searchForm = useForm({
    search: '',
})

const api_url = 'https://api.unsplash.com/search/photos/?client_id=ahHf84Dc3ySbEx_KrRQ_UZtFFjHjGcNxTIzoCdNwyhw&per_page=1';
const image_cache = ref([]);
const current_image = computed(() => {
    if (image_cache.value[searchForm.search]) {
        return image_cache.value[searchForm.search][arrow.value] || null
    }
});
const arrow = ref(0);
const submit = async () => {
    if (!image_cache.value[arrow.value]) {
        await fetch(api_url + '&query=' + searchForm.search + '&page=' + (arrow.value + 1))
            .then(response => response.json()) // Convert response to JSON
            .then(data => {
                if (image_cache.value[searchForm.search]) {
                    image_cache.value[searchForm.search][arrow.value] = data.results[0].urls.small
                } else {
                    image_cache.value[searchForm.search] = []
                    image_cache.value[searchForm.search][arrow.value] = data.results[0].urls.small
                }
                
            })
    }
};

const change_category = () => {
    arrow.value = 0
    submit()
}

const debouncedSubmit = debounce(change_category, 300)
const next = () => {    
    arrow.value = arrow.value + 1
    submit()
}
const previous = () => {
    arrow.value = Math.max(arrow.value - 1, 0)
    submit()
}
</script>

<template>
    <div class="flex">
        <div id="sidebar" class="min-w-[200px] bg-blue-300 min-h-screen p-4">
            <nav>
                <ul>
                    <li>
                        <NavLink :href="route('screen1')">Screen 1</NavLink>
                    </li>
                    <li>
                        <NavLink :href="route('screen2')">Screen 2</NavLink>
                    </li>
                    <li>
                        <NavLink :href="route('screen3')">Screen 3</NavLink>
                    </li>
                </ul>
            </nav>
        </div>
        <div id="main" class=" justify-center flex align-middle p-10 flex-grow">
            <div class="main-inner min-h-screen w-full">
                <div class="mb-5">
                    <div>
                        <input type="text" @change="debouncedSubmit" v-model="searchForm.search">
                    </div>
                </div>
                <div class="relative w-full flex items-center bg-gray-200">
                    <button @click="previous" v-if="current_image && arrow > 0" class="absolute left-0 top-1/2 -translate-y-1/2 p-2 bg-gray-800 text-white rounded-full">
                        ←
                    </button>
                    <button @click="next" v-if="current_image" class="absolute right-0 top-1/2 -translate-y-1/2 p-2 bg-gray-800 text-white rounded-full">
                        →
                    </button>
                    <img :src="current_image" />
                </div>
            </div>
        </div>
    </div>
</template>
