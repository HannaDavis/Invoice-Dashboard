// Code of the component SimplePagination.vue
<template>
    <div id="pagination" class="w-full flex justify-center border-t border-gray-100 pt-4 items-center">
        <div v-for="link in data">
            <inertia-link v-if="link.url" :href="link.url">
                <p class="leading-relaxed cursor-pointer mx-2 text-gray-500 hover:text-blue-600 text-sm font-semibold"
                   v-text="formatLabel(link.label)">
                </p>
            </inertia-link>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        data: Object
    },
    data() {
        return {};
    },
    methods: {
        formatLabel: function (label) {
            return label.replace('&laquo;', '').replace('&raquo;', '');
        }
    }
}
</script>
