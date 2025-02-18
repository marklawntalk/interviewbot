<template>
    <div>
        <input type="text" @keyup="debouncedSubmit" v-model="searchForm.search">
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
                <tr v-for="record in props.records" :key="record.id">
                    <td>{{ record.id }}</td>
                    <td>{{ record.title }}</td>
                    <td>{{ record.status }}</td>
                    <td>{{ record.notes }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script setup>

</script>