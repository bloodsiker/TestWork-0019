<template>
    <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
        <div class="flex place-content-end mb-4">
            <div class="px-4 py-2 text-white bg-yellow-500 hover:bg-yellow-600 cursor-pointer">
                <router-link :to="{ name: 'cities.create' }" class="text-sm font-medium">Create city</router-link>
            </div>
        </div>

        <table class="min-w-full border divide-y divide-gray-200">
            <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-left">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">Name</span>
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">Country</span>
                </th>
                <th class="px-6 py-3 bg-gray-50 text-right">
                </th>
            </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
            <template v-for="item in cities" :key="item.id">
                <tr class="bg-white">
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ item.name }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ item.country ? item.country.name : '' }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 text-right whitespace-no-wrap">
                        <router-link :to="{ name: 'cities.edit', params: { id: item.id } }"
                                     class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Edit
                        </router-link>
                        <button @click="deleteCity(item.id)"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Delete</button>
                    </td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script>
import useCity from "../../composables/city";
import { onMounted } from "vue";

export default {
    setup() {
        const { cities, getCities, destroyCity } = useCity()

        onMounted(getCities)

        const deleteCity = async (id) => {
            if (!window.confirm('Are you sure?')) {
                return
            }

            await destroyCity(id);
            await getCities();
        }

        return {
            cities,
            deleteCity
        }
    }
}
</script>
