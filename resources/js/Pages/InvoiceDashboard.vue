<template>
    <breeze-authenticated-layout>
        <template #header>
            <div v-if="invoiceCount">
<!--                <div class="font-sans text-black bg-white flex justify-end mb-8">-->
<!--                    <div class="border rounded overflow-hidden flex">-->
<!--                        <input type="text"-->
<!--                               class="border-none px-4 py-2"-->
<!--                               placeholder="Search..."-->
<!--                               v-model="terms">-->

<!--                        <button class="flex items-center justify-center px-4 border-l">-->
<!--                            <svg class="h-4 w-4 text-grey-dark" fill="currentColor" xmlns="http://www.w3.org/2000/svg"-->
<!--                                 viewBox="0 0 24 24">-->
<!--                                <path-->
<!--                                    d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z"/>-->
<!--                            </svg>-->
<!--                        </button>-->
<!--                    </div>-->
<!--                </div>-->

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
                    <tr v-for="invoice in invoiceItems.data" :key="invoice.id">
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
                            <p v-if="invoice.accountant" class="text-gray-900 whitespace-no-wrap text-center">
                                {{ invoice.accountant.first_name }} {{ invoice.accountant.last_name }}</p>
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
import {debounce} from "lodash";


export default {
    props: ['invoices'],
    components: {
        Button,
        BreezeAuthenticatedLayout,
        Pagination
    },
    data() {
        return {
            delay: 1000,
            terms: '',
            keyword: '',
            invoiceItems: this.$props.invoices
        }
    },
    methods: {
        exportPDF: function (invoiceId) {
            axios.post("/invoices/export/" + invoiceId);
        }
    }, watch: {
        terms: _.debounce(function () {
            this.keyword = this.terms;
            axios.get("/search", { params: { keyword: this.keyword } }).then(function (data) {
                console.log(data);
            });
        }, 1000)
    },
    computed: {
        invoiceCount: function () {
            return this.invoices.data.length > 0;
        }
    }
}
</script>
