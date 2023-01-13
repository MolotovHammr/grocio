import { SECRET_CATALOGUE_SERVICE_URL } from '$env/static/private'


export async function load({params}){
    const res = await fetch(`${SECRET_CATALOGUE_SERVICE_URL}/api/catalogues/${params.catalogueId}`)
    const data = await res.json()
    return data
}