<template>
    <breeze-authenticated-layout>
        <template #header>
            <div v-if="invoiceCount">
                <table class="min-w-full leading-normal">
                    <thead>
                    <tr>
                        <th class="w-1/5 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Client
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
                        <th class="w-1/5 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Accountant
                        </th>
                        <th class="w-1/5 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"></th>
                        <th class="w-1/5 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="invoice in invoices.data" :key="invoice.id">
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap text-left">{{ invoice.client.name }}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap text-left">{{ invoice.description }}</p>
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
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p v-if="invoice.accountant" class="text-gray-900 whitespace-no-wrap text-center">{{ invoice.accountant.first_name }} {{ invoice.accountant.last_name }}</p>
                            <p v-else class="text-gray-900 whitespace-no-wrap text-center">Not Assigned</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <inertia-link :href="'invoices/'+invoice.id">View</inertia-link>
                            </button>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <a :href="'/invoices/export/'+invoice.id">PDF</a>
                            </button>
                        </td>
<!--                         <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">-->
<!--                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="exportPDF(invoice.id)">-->
<!--                                PDF Export-->
<!--                            </button>-->
<!--                        </td>-->

                    </tr>

                    </tbody>
                </table>
                <pagination :data="invoices.links"></pagination>
            </div>
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
import Pagination from '../Components/Pagination'
import Button from "../Components/Button";


export default {
    props: ['invoices'],
    components: {
        Button,
        BreezeAuthenticatedLayout,
        Pagination
    },
    data() {
        return {}
    },
    methods: {
        exportPDF: function(invoiceId){
            axios.post("/invoices/export/"+ invoiceId);
        }
    },
    computed: {
        invoiceCount: function () {
            return this.invoices.data.length > 0;
        }
    }
}
</script>
