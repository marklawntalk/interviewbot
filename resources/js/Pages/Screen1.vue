<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';

import { computed, ref } from 'vue';
import { useForm, router } from '@inertiajs/vue3';
import debounce from "lodash/debounce"
defineProps({ records: Object | Array })
const searchForm = useForm({
    search: '',
})

const submit = () => {
    router.visit(route('screen1', {
        search: searchForm.search,
    }), {
        preserveState: true,
        only: ['records'],
    })
};

const debouncedSubmit = debounce(submit, 300)
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
                        <input type="text" @keyup="debouncedSubmit" v-model="searchForm.search">
                    </div>
                </div>

                <div>
                    <table class="min-w-full border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2 border">ID</th>
                                <th class="px-4 py-2 border">Title</th>
                                <th class="px-4 py-2 border">Status</th>
                                <th class="px-4 py-2 border">Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="record in records" class="odd:bg-white even:bg-gray-100">
                                <td class="px-4 py-2 border">{{ record.ID }}</td>
                                <td class="px-4 py-2 border">{{ record.Title }}</td>
                                <td class="px-4 py-2 border">{{ record.Status }}</td>
                                <td class="px-4 py-2 border">{{ record.Notes }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
