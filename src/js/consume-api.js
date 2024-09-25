import { setLocalStorageItem, getLocalStorageItem } from "./helpers.js"

export const getProducts = async () => {
    const url = 'http://localhost:8000/api/produtos.php'
    try {
        const res = await fetch(url)
        if (!res.ok) {
            throw new Error(`Response status: ${res.status}`)
        }

        const json = await res.json()
        setLocalStorageItem('placas', json)
    } catch (error) {
        console.error(error.message)
    }
}