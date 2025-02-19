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
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="record in records">
                                <td>{{ record.ID }}</td>
                                <td>{{ record.Title }}</td>
                                <td>{{ record.Status }}</td>
                                <td>{{ record.Notes }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
