import { ref } from 'vue'
import axios from "axios";
import { useRouter } from 'vue-router';

export default function useCity() {
    const cities = ref([])
    const city = ref([])
    const router = useRouter()
    const errors = ref('')

    const getCities = async () => {
        let response = await axios.get('/api/cities')
        cities.value = response.data.data;
    }

    const getCity = async (id) => {
        let response = await axios.get('/api/cities/' + id)
        city.value = response.data.data;
    }

    const storeCity = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/cities', data)
            await router.push({name: 'cities.index'})
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const updateCity = async (id) => {
        errors.value = ''
        try {
            await axios.put('/api/cities/' + id, company.value)
            await router.push({name: 'cities.index'})
        } catch (e) {
            if (e.response.status === 422) {
               errors.value = e.response.data.errors
            }
        }
    }

    const destroyCity = async (id) => {
        await axios.delete('/api/cities/' + id)
    }


    return {
        cities,
        city,
        errors,
        getCities,
        getCity,
        storeCity,
        updateCity,
        destroyCity
    }
}
