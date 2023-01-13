import { SECRET_CATALOGUE_SERVICE_URL } from '$env/static/private'


export async function load(){
    console.log(`${SECRET_CATALOGUE_SERVICE_URL}/api/items/catalogues/1`)
    const res = await fetch(`${SECRET_CATALOGUE_SERVICE_URL}/api/items/catalogues/1`)
    const data = await res.json()
    console.log(data)
    return data
}