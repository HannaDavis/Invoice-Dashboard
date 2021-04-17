<template>
    <breeze-authenticated-layout>
        <template #header>
            <table class="min-w-full leading-normal" v-if="invoiceCount">
                <thead>
                <tr>
                    <th class="w-1/5 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Client ID
                    </th>
                    <th class="w-1/5 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Description
                    </th>
                    <th class="w-1/5 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Subtotal
                    </th>
                    <th class="w-1/5 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Tax
                    </th>
                    <th class="w-1/5 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Total
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="invoice in invoices" :key="invoice.id">
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap text-center">{{ invoice.client_id }}</p>
                    </td>
                     <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap text-center">{{ invoice.description }}</p>
                    </td>
                     <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap text-center">{{ invoice.subtotal }}</p>
                    </td>
                     <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap text-center">{{ invoice.tax }}</p>
                    </td>
                     <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap text-center">{{ invoice.total }}</p>
                    </td>
                </tr>

                </tbody>
            </table>
            <div v-else>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Nothing Found!
                </h2>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <inertia-link href="/dashboard/create">Add</inertia-link>
                </button>
            </div>
        </template>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated'
import Button from "../Components/Button";

export default {
    props: ['invoices'],
    components: {
        Button,
        BreezeAuthenticatedLayout,
    },
    data() {
        return {}
    },
    computed: {
        invoiceCount: function () {
            return this.invoices.length > 0;
        }
    }
}
</script>
