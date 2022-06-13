import { ref } from 'vue'
import axios from "axios";
import { useRouter } from 'vue-router';

export default function useCountries() {
    const countries = ref([])
    const cities = ref([])
    const country = ref([])
    const router = useRouter()
    const errors = ref('')

    const getCountries = async () => {
        let response = await axios.get('/api/countries')
        countries.value = response.data.data;
    }

    const getCitiesByCountry = async (id) => {
        let response = await axios.get('/api/countries/' + id + '/cities')
        cities.value = response.data.data;
    }

    const getCountry = async (id) => {
        let response = await axios.get('/api/countries/' + id)
        country.value = response.data.data;
    }

    const storeCountry = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/countries', data)
            await router.push({name: 'countries.index'})
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const updateCountry = async (id) => {
        errors.value = ''
        try {
            await axios.put('/api/countries/' + id, country.value)
            await router.push({name: 'countries.index'})
        } catch (e) {
            if (e.response.status === 422) {
               errors.value = e.response.data.errors
            }
        }
    }

    const destroyCountry = async (id) => {
        await axios.delete('/api/countries/' + id)
    }


    return {
        countries,
        country,
        cities,
        errors,
        getCountries,
        getCountry,
        getCitiesByCountry,
        storeCountry,
        updateCountry,
        destroyCountry
    }
}
