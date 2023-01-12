import { SECRET_CATALOGUE_SERVICE_URL } from '$env/static/private'


export async function load(){
    const res = await fetch(`${SECRET_CATALOGUE_SERVICE_URL}/api/items/catalogues/1`)
}