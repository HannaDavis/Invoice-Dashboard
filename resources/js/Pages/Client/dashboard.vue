<template>
    <breeze-authenticated-layout>
        <template #header>
            <div v-if="clientCount">
                <table class="min-w-full leading-normal">
                    <thead>
                    <tr>
                        <th class="w-1/5 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Name
                        </th>
                        <th class="w-1/5 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Address
                        </th>
                        <th class="w-1/5 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Joined
                        </th>
                        <th class="w-1/5 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="client in clients.data" :key="client.id">
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap text-left">{{ client.name }}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap text-left">{{ client.address }}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap text-center">{{ client.created_at }}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <inertia-link :href="'client/'+client.id">View</inertia-link>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <pagination :data="clients.links"></pagination>
            </div>
            <div v-else>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    No Clients Found!
                </h2>
                <!--                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">-->
                <!--                    <inertia-link href="/dashboard/create">Add</inertia-link>-->
                <!--                </button>-->
            </div>
        </template>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated'
import Pagination from '@/Components/Pagination'
import Button from "@/Components/Button";


export default {
    props: ['clients'],
    components: {
        Button,
        BreezeAuthenticatedLayout,
        Pagination
    },
    data() {
        return {}
    },
    computed: {
        clientCount: function () {
            return this.clients.data.length > 0;
        }
    }
}
</script>
