<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';

import { computed, ref } from 'vue';
import { useForm, router } from '@inertiajs/vue3';
import debounce from "lodash/debounce"
const props = defineProps({ boxes: Object | Array })
const final_boxes = computed(() => {
    console.log( props.boxes)
    return props.boxes
})
const toggle = (row_index, index) => {
    router.visit(route('screen3', {
            boxes: JSON.stringify(final_boxes.value),
            row_index: row_index,
            index: index,
        }), {
        only: ["boxes"],
    })
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
                <div v-for="(box_row,row_index) in final_boxes" class="relative flex">

                    <div v-for="(box_column,index) in box_row" @click="toggle(row_index,index)"
                        :class="[box_column == 1 ? 'bg-blue-800' : 'bg-red-800']"
                        class="w-[100px] h-[100px] bg-red-800 border border-black flex items-center justify-center">
                        <span>
                            {{ box_column }}
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
